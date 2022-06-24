<?php

namespace App\Http\Controllers;

use App\Events\FostererApplicationApproved;
use App\Events\FostererApplicationRejected;
use App\Models\Fosterer;
use Illuminate\Http\Request;

class FostererAppController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Fosterer $application)
    {
        $this->authorize('user.view');

        return response()->view('admin.users.fosterer-app', ['application' => $application]);
    }

    public function approve(Fosterer $application) {
        $this->authorize('user.edit');

        $application->approve()->save();

        session()->flash('success', 'Fosterer application has been approved');

        event(new FostererApplicationApproved($application));

        return response()->redirectToRoute('users.pending');
    }


    public function reject(Fosterer $application) {
        $this->authorize('user.edit');

        $user = $application->user;

        $application->forceDelete();

        session()->flash('success', 'Fosterer application has been rejected');

        event(new FostererApplicationRejected($user));

        return response()->redirectToRoute('users.pending');
    }
}
