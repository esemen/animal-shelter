<?php

namespace App\Http\Controllers;

use App\Events\VetterApplicationApproved;
use App\Events\VetterApplicationRejected;
use App\Models\Vetter;
use Illuminate\Http\Request;

class VetterAppController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Vetter $application)
    {
        $this->authorize('user.view');

        return response()->view('admin.users.vetter-app', ['application' => $application]);
    }

    public function approve(Vetter $application) {
        $this->authorize('user.edit');

        $application->approve()->save();

        session()->flash('success', 'Vetter application has been approved');

        event(new VetterApplicationApproved($application));

        return response()->redirectToRoute('users.pending');
    }


    public function reject(Vetter $application) {
        $this->authorize('user.edit');

        $user = $application->user;

        $application->forceDelete();

        session()->flash('success', 'Vetter application has been rejected');

        event(new VetterApplicationRejected($user));

        return response()->redirectToRoute('users.pending');
    }
}
