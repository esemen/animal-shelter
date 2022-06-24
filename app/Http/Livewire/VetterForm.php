<?php

namespace App\Http\Livewire;

use App\Events\VetterApplicationCreated;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Vetter;

class VetterForm extends Component
{
    public array $state = [];

    public $travel;
    public $home_check;
    public $transport;
    public $own_dog;
    public $other_rescues;
    public $dogs_adopted;
    public $additional_info;
    public Vetter $vetter;

    public function render()
    {
        return view('livewire.vetter-form')
            ->extends('layouts.admin')
            ->section('content');
    }

    public function mount()
    {
        if( isset(auth()->user()->vetter)){
            session()->flash('message', 'You already have a vetter application.');

            $this->redirectRoute('home');
        }
    }

    public function validateState()
    {
        $confirmationArray = collect(config('mtar.vetter_form.options.confirmations'))->flatMap(function($item, $key) { return ['state.confirmations.'.$key => 'accepted' ]; })->toArray();

        $validationRules = [
            'state.travel' => 'required',
            'state.home_check' => 'required',
            'state.transport' => 'required',
            'state.own_dog' => 'required',
            'state.other_rescues' => 'nullable',
            'state.dogs_adopted' => 'nullable',
            'state.additional_info' => 'nullable',

        ];

        $this->validate(array_merge($validationRules, $confirmationArray),[
            'accepted' => 'You have to confirm',
            'required' => 'This field is required',
//            'required_if' => 'This field is required',
//            'required_unless' => 'This field is required',
        ]);

        return $this;
    }

    public function saveForm()
    {
        $this->validateState();

        $this->vetter = new Vetter($this->state);

        $this->vetter
            ->fill($this->state)
            ->user()->associate(auth()->user())
            ->save();

        session()->flash('message', 'Your vetter application has been received successfully');

        event(new VetterApplicationCreated($this->vetter));

        $this->redirectRoute('home');
    }
}
