<?php

namespace App\Http\Controllers;

use App\Models\Fosterer;
use App\Models\User;
use App\Models\Vetter;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $this->authorize('user.view');
//
//        $users = User::paginate(25);
//
//        return response()->view('admin.users.index', [
//            'users' => $users
//        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        $this->authorize('user.edit');

        $pendingVetters = Vetter::pending()->with('user')->paginate();

        $pendingFosterers = Fosterer::pending()->with('user')->paginate();

        return response()->view('admin.users.pending', [
            'pendingVetters' => $pendingVetters,
            'pendingFosterers' => $pendingFosterers,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('user.view');

        return response()->view('admin.users.show', ['user' => $user]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('user.delete');

        $user->delete();
    }
}
