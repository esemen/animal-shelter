<?php

namespace App\Http\Livewire\Admin;

use App\Events\HomeCheckAssigned;
use App\Models\Application;
use App\Models\HomeCheck;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class ApplicationShow extends Component
{
    public Application $application;
    public string $vetterSearch = '';
    public $vetter = null;

    public function render()
    {
        return view('livewire.admin.application-show')
            ->extends('layouts.admin')
            ->section('content');
    }

    public function mount(Application $application)
    {
        $this->application = $application;
    }

    public function getVetterSearchResultsProperty()
    {
        $searchTerm = $this->vetterSearch;

        return User::when($this->vetterSearch, function ($query) use ($searchTerm) {
            $query->where('search_key', 'like', '%' . Str::slug($searchTerm) . '%');
        })
            ->whereHas('vetter', function ($query) {
                $query->approved();
            })
            ->limit(500)
            ->get();

    }

    public function setVetter($uuid)
    {
        $this->vetter = User::where('uuid', $uuid)->firstOrFail();
    }

    public function assignVetter()
    {
        $homeCheck = new HomeCheck;
        $homeCheck->user()->associate($this->vetter);
        $homeCheck->application()->associate($this->application);
        $homeCheck->save();

        event(new HomeCheckAssigned($homeCheck));

        $this->redirectRoute('applications.show', ['application' => $this->application]);
    }
}
