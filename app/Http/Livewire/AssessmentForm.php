<?php

namespace App\Http\Livewire;

use App\Models\Assessment;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class AssessmentForm extends Component
{

    public array $state = [];
    public Animal $animal;
    public Assessment $assessment;

    /**
     * @var mixed
     */

    public function validateState()
    {
        $this->validate([
            "state.dog.dog_reaction" => "required",
            "state.dog.meeting_children" => "required",
            "state.dog.meeting_people" => "required",
            "state.dog.meeting_cats" => "required",
            "state.dog.traffic" => "required",
            "state.dog.on_lead" => "required",
            "state.dog.travel" => "required",
            "state.dog.crate_training" => "required",
            "state.dog.house_training" => "required",
        ],[
            'required' => 'This field is required.'
        ]);

        return $this;
    }

    public function mount(Assessment $assessment, Animal $animal)
    {
        $this->assessment = $assessment;
        $this->animal = $animal;

        // Load state
        $this->state = $this->assessment ? $this->assessment->withoutRelations()->toArray() : $this->assessment;

    }


    public function render()
    {
        return view('livewire.assessment-form', ['animal' => $this->animal])
            ->extends('layouts.app')
            ->section('content');

    }


    private function saveForm()
    {
        $this->assessment
            ->fill($this->state)
            ->user()->associate(auth()->user())
            ->animal()->associate($this->animal)
            ->save();

        return $this;
    }

    public function saveDraft()
    {
        $this->saveForm();

        $this->emit('draftSaved');
    }

    public function saveApplication()
    {
        $this
            ->saveForm()
            ->validateState();

        session()->flash('message','Your assessment has been saved successfully');

        return $this->redirectRoute('home');
    }

}
