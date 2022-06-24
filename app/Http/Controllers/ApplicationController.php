<?php

namespace App\Http\Controllers;

use App\Events\AdoptionApplicationApproved;
use App\Models\Animal;
use App\Models\Application;
use App\Models\ApplicationStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Str;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Initiate the application process
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Animal $animal)
    {
        // Check if the application exists
        $application = $animal->applications()
            ->where('user_id', auth()->user()->id)
            ->first();

        if (!$application) {
            $application = new Application();

            $application->status()->associate(ApplicationStatus::firstWhere('slug', 'draft'));

            $application->animal()->associate($animal);

            $application->user()->associate(auth()->user());

            $application->save();
        }

        return response()->redirectToRoute('application.form', ['application' => $application]);
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Application $application
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download(Application $application, string $type)
    {
        $uploads = collect($application->uploads);

        $file = $uploads->first(function ($value, $key) use ($type) {
            return Str::slug($key) === $type;
        });

        if ($file) {
            $fileName = storage_path('app/' . config('mtar.application_upload_path') . '/' . $file['filename']);

            return response()->download($fileName);
        } else {
            abort(404);
        }
    }

    public function approve(Application $application) {
        $this->authorize('user.edit');

        $status = ApplicationStatus::firstWhere('name','Adopted');

        $application->status()->associate($status);

        $application->approve()->save();

        session()->flash('success', 'The application has been approved');

        event(new AdoptionApplicationApproved($application));

        return response()->redirectToRoute('applications.index');
    }


    public function reject(Application $application) {

        $status = Application::firstWhere('name','Unsuccessful');

        $application->status()->associate($status);
        $application->save();

        session()->flash('success', 'The application has been rejected');

//        event(new ApplicationRejected($user));

        return response()->redirectToRoute('applications.index');
    }
}
