<?php

namespace App\Http\Livewire;

use App\Models\Application;
use Livewire\Component;

class AdopterApplicationShow extends Component
{
    public Application $application;

    public function render()
    {
        return view('livewire.adopter-application-show')
            ->extends('layouts.app')
            ->section('content');
    }

    public function mount(Application $application) {
        if (auth()->user()->is($application->user)) {
            $this->application = $application;
        }
        else {
            abort(403);
        }
    }
}
