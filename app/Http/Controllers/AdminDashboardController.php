<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    protected function index() {

        $animalCount = Animal::count();
        $applicationCount = Application::count();
        $userCount = User::count();
        $pendingHomeChecks = auth()->user()->homeChecks()->pending()->count();

        return view('admin.dashboard', [
            'animalCount' => $animalCount,
            'applicationCount' => $applicationCount,
            'userCount' => $userCount,
            'homeChecksCount' => $pendingHomeChecks
        ]);
    }
}
