<?php

namespace App\Http\Controllers;

use App\Events\HomeCheckAssessmentStored;
use App\Models\HomeCheck;
use Illuminate\Http\Request;

class HomeCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('vetter.home-check');

        $homeChecks = auth()
            ->user()
            ->homeChecks()
            ->pending()
            ->with('application')
            ->get();

        return response()->view('admin.home-checks.index', [
            'homeChecks' => $homeChecks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\HomeCheck $homeCheck
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeCheck $homeCheck)
    {
        $this->authorize('vetter.home-check');

        if (auth()->user()->isNot($homeCheck->user) && !auth()->user()->hasRole('Super Admin')) {
            abort('403');
        }

        if ($homeCheck->completed) {
            return response()->redirectToRoute('home-checks.index');
        }

        return response()->view('admin.home-checks.edit', ['homeCheck' => $homeCheck]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HomeCheck $homeCheck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeCheck $homeCheck)
    {
        $this->authorize('vetter.home-check');

        if (auth()->user()->isNot($homeCheck->user) && !auth()->user()->hasRole('Super Admin')) {
            abort('403');
        }

        if ($homeCheck->completed) {
            return response()->redirectToRoute('home-checks.index');
        }

        $validated = $request->validate([
            'check_date' => 'required|date',
            'notes' => 'required',
            'opinion' => 'required|integer|between:1,5'
        ]);

        $homeCheck->fill($validated)
            ->complete()
            ->save();

        session()->flash('success', 'Your assessment has been stored successfully');

        event(new HomeCheckAssessmentStored($homeCheck));

        return response()->redirectToRoute('home-checks.index');
    }

}
