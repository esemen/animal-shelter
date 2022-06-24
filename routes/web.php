<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalPublicController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\FostererAppController;
use App\Http\Controllers\HomeCheckController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\VetterAppController;
use App\Http\Livewire\ApplicationForm;
use App\Http\Livewire\AssessmentForm;
use App\Http\Livewire\Admin\ApplicationList;
use App\Http\Livewire\Admin\ApplicationShow;
use App\Http\Livewire\AdopterApplicationShow;
use App\Http\Livewire\FostererForm;
use App\Http\Livewire\Admin\UsersList as UsersList;
use App\Http\Livewire\VetterForm;
use App\Http\Livewire\Admin\AnimalsList;

use App\Models\Page;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return view("index");
})->name('index');

// Thanks Page
Route::get("thanks", [CustomPageController::class, 'thanks']);
Route::get('news-and-events',  [CustomPageController::class, 'news']);



/**
 * Adopt a pet menu
 */
Route::get('adopt-an-animal/{animal_type:type?}', [AnimalPublicController::class, 'search'])->name('adopt-a-pet');


/**
 * Show Animal Public Page
 */
Route::get('animal/{name}/{animal:uuid}', [AnimalPublicController::class, 'show'])->name('pet.show');


/**
 * Authenticated Section
 */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);

    Route::prefix("home")->group(function () {
        Route::get("/", [HomeController::class, 'index'])->name("home");
        Route::get("profile", [ProfileController::class, 'index'])->name("profile");

        // Application
        Route::get('apply/{animal:uuid}', [ApplicationController::class, 'create'])->name('application.create');
        Route::get('application/form/{application:uuid}', ApplicationForm::class)->name('application.form');
        Route::get('application/{application:uuid}', AdopterApplicationShow::class)->name('application.show');

    });

    // Become a vetter & fosterer
    Route::get('become-fosterer', FostererForm::class)->name('become-fosterer');
    Route::get('become-vetter', VetterForm::class)->name('become-vetter');

    //Assessment form
    Route::get('assessment-form/{name}/{animal:uuid}', AssessmentForm::class)->name('assessment-form');

    /**
     * Admin Section
     */
    Route::prefix('admin')->group(function () {
        Route::group(['middleware' => ['admin']], function () {
            // Dashboard
            Route::get("/", [AdminDashboardController::class, 'index'])->name('admin.dashboard');

            // Animals
            Route::get('animals/status/{status:slug}', AnimalsList::class, )->name('animals.bystatus');
            Route::get('animals', AnimalsList::class)->name('animals');
            Route::resource("animals", AnimalController::class)->except(['store', 'update']);

            // Applications
            //Route::resource('applications', ApplicationAdminController::class)->except(['index','create','store']);
            Route::get('applications/status/{status:slug}', ApplicationList::Class)->name('applications.bystatus');
            Route::get('applications', ApplicationList::class)->middleware('can:application.view')->name('applications.index');
            Route::get('applications/{application:uuid}', ApplicationShow::class)->middleware('can:application.view')->name('applications.show');
            Route::get('applications/{application:uuid}/download/{type}', [ApplicationController::class, 'download'])->middleware('can:application.view')->name('applications.download');
            Route::put('applications/{application:uuid}', [ApplicationController::class, 'approve'])->name('applications.approve');
            Route::delete('applications/{application:uuid}', [ApplicationController::class, 'reject'])->name('applications.reject');

            // Home Checks
            Route::resource('home-checks', HomeCheckController::class)->parameters(['roles' => 'user'])->only('index', 'edit', 'update');

            // Users
            Route::prefix('users')->group(function () {
                Route::get('pending', [UserController::class, 'pending'])->name('users.pending');

                Route::get('vetter-app/{application:uuid}', [VetterAppController::class, 'show'])->name('users.vetter.show');
                Route::put('vetter-app/{application:uuid}', [VetterAppController::class, 'approve'])->name('users.vetter.approve');
                Route::delete('vetter-app/{application:uuid}', [VetterAppController::class, 'reject'])->name('users.vetter.reject');

                Route::get('fosterer-app/{application:uuid}', [FostererAppController::class, 'show'])->name('users.fosterer.show');
                Route::put('fosterer-app/{application:uuid}', [FostererAppController::class, 'approve'])->name('users.fosterer.approve');
                Route::delete('fosterer-app/{application:uuid}', [FostererAppController::class, 'reject'])->name('users.fosterer.reject');
            });
            Route::resource('users', UserController::class)->except(['create', 'store']);
            Route::get('users', UsersList::class)->name('users');

            // User Roles
            Route::resource('roles', UserRoleController::class)->parameters(['roles' => 'user'])->only('edit', 'update');

            // Pages
            Route::resource('pages', PageController::class);
        });
    });
});


/**
 *  Custom Public Pages
 */
$pages = Page::with('pageType')->routable()->get();

foreach ($pages as $page) {
    $prefix = $page->pageType->prefix ? $page->pageType->prefix . '/' : null;

    Route::get($prefix . $page->slug, function () use ($page) {
        return view('pages.index', ['page' => $page]);
    });
}
if (App::environment(['local', 'staging'])) {
    Route::get('migrate-users', fn() => \App\Jobs\MigrateUsers::dispatch(250) ? 'Started' : 'Failed');
    Route::get('migrate-animals', fn() => \App\Jobs\MigrateAnimals::dispatch(500) ? 'Started' : 'Failed');
    Route::get('migrate-apps', fn() => \App\Jobs\MigrateApplications::dispatch(250) ? 'Started' : 'Failed');
}
