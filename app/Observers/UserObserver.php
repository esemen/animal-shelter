<?php

namespace App\Observers;

use App\Models\User;
use Str;

class UserObserver
{
    /**
     * Handle the User "saving" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function saving(User $user)
    {
        $user->search_key = Str::slug(trim($user->first_name) . ' ' . trim($user->last_name));
    }
}
