<?php

namespace App\Http\Livewire;

use App\Events\FostererApplicationCreated;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Fosterer;
use Livewire\WithFileUploads;

class FostererForm extends Component
{
    use WithFileUploads;

    public array $state = [];

    public $propertySelect;
    public $exerciseSelect;
    public $rentalAgreement;
    public $employerVerification;
    public Fosterer $fosterer;

    public function mount()
    {
        $this->state['fostering']['preferences'] = [];
        $this->state['fostering']['collection'] = [];

        if( isset(auth()->user()->fosterer)){
            session()->flash('message', 'You already have a fosterer application.');

            $this->redirectRoute('home');
        }
    }

    public function render()
    {
        return view('livewire.fosterer-form')
            ->extends('layouts.admin')
            ->section('content');
    }

    public function validateState()
    {
        $confirmationArray = collect(config('mtar.fosterer_form.options.confirmations'))->flatMap(function($item, $key) { return ['state.confirmations.'.$key => 'accepted' ]; })->toArray();

        $validationRules = [
            'state.experience.applied_before' => 'required',
            'state.experience.fostered_before' => 'required',
            'state.experience.fostered_before_info' => 'required_if:state.experience.fostered_before,yes',
            'state.fostering.start' => 'required',
            'state.fostering.continue' => 'required',
            'state.fostering.transport' => 'required',
            'state.fostering.collection' => 'nullable',
            'state.fostering.nearest' => 'nullable',
            'propertySelect' => 'required',
            'state.property.type' => 'required_if:propertySelect,Other',
            'state.property.ownership' => 'required',
            'rentalAgreement' => 'required_if:state.property.ownership,rent|nullable|file|mimetypes:application/pdf',
            'state.garden.size' => 'required',
            'state.garden.separate' => 'required_unless:state.garden.size,no',
            'state.garden.communal' => 'required',
            'state.garden.fence' => 'required',
            'state.garden.pool' => 'required',
            'state.garden.kennel' => 'required',
            'state.occupants.children.*' => 'required|integer',
            'state.occupants.visitor' => 'required',
            'state.occupants.adults' => 'required|array|min:1',
            'state.occupants.adults.*' => 'required|integer',
            'state.occupation.working_hours' => 'required',
            'state.occupation.wfh' => 'required',
            'employerVerification' => 'required_if:state.occupation.wfh,yes|nullable|file|mimetypes:application/pdf',
            'state.occupation.wfh_kept' => 'required',
            'state.occupation.hours_left' => 'required',
            'state.occupation.days_left' => 'required',
            'state.experience.past_animals' => 'required',
            'state.experience.other_animals' => 'required',
            'state.experience.resident_dogs' => 'required',
            'state.experience.reactive_dogs' => 'required',
            'state.experience.dog_issues' => 'required_if:state.experience.reactive_dogs,yes',
            'state.care.neutered' => 'required',
            'state.care.not_neutered' => 'required_if:state.care.neutered,no',
            'state.care.inoculated' => 'required',
            'state.care.not_inoculated' => 'required_if:state.care.inoculated,no',
            'state.care.walk' => 'required',
            'exerciseSelect' => 'required',
            'state.care.exercise_areas' => 'required_if:exerciseSelect,Other',
            'state.care.sleeping_area' => 'required',
            'state.care.vetter' => 'required',
            'state.fostering.preferences' => 'required|min:1',
            'state.fostering.older' => 'required',
            'state.fostering.prospective' => 'required',
            'state.fostering.bad_candidate' => 'required',
            'state.plans.move' => 'required',
        ];

        $this->validate(array_merge($validationRules, $confirmationArray),[
            'accepted' => 'You have to confirm',
            'required' => 'This field is required',
            'state.fostering.preferences.required' => 'You should select at least one option',
            'required_if' => 'This field is required',
            'required_unless' => 'This field is required',
            'rentalAgreement.required_if' => 'Please upload your rental agreement as PDF file',
            'employerVerification.required_if' => 'Please upload your employer verification as PDF file',
        ]);

        return $this;
    }

    private function prepareState()
    {
        $this->state['property']['type'] = $this->propertySelect === 'Other' ? $this->state['property']['type'] ?? null : $this->propertySelect;
        $this->state['care']['exercise_areas'] = $this->exerciseSelect === 'Other' ? $this->state['care']['exercise_areas'] ?? null : $this->exerciseSelect;

        return $this;
    }

    public function addChild()
    {
        $this->state['occupants']['children'][] = '';
    }

    public function removeChild($index)
    {
        if ($index < count($this->state['occupants']['children'] ?? [])) {
            array_splice($this->state['occupants']['children'], $index, 1);
        }
    }

    public function addAdult()
    {
        $this->state['occupants']['adults'][] = '';
    }

    public function removeAdult($index)
    {
        if ($index < count($this->state['occupants']['adults'] ?? [])) {
            array_splice($this->state['occupants']['adults'], $index, 1);
        }
    }

    private function saveFiles()
    {
        $filePath = config('mtar.application_upload_path');

        $uploads = [];

        // Rental Agreement
        if ($this->fosterer->property['ownership'] === 'rent') {
            $fileName = Str::uuid() . '.' . $this->rentalAgreement->getClientOriginalExtension();

            $this->rentalAgreement->storeAs($filePath, $fileName);

            $uploads['rental_agreement'] = [
                'filename' => $fileName,
                'original' => $this->rentalAgreement->getClientOriginalName()
            ];
        }

        // Employer Verification
        if ($this->fosterer->occupation['wfh'] === 'yes') {
            $fileName = Str::uuid() . '.' . $this->employerVerification->getClientOriginalExtension();

            $this->employerVerification->storeAs($filePath, $fileName);

            $uploads['employer_verification'] = [
                'filename' => $fileName,
                'original' => $this->employerVerification->getClientOriginalName()
            ];
        }

        // Persist the record
        if ($uploads) {
            $this->fosterer->fill(['uploads' => $uploads])->save();
        }

        return $this;
    }

    public function saveForm()
    {
        $this->validateState()
            ->prepareState();

        $this->fosterer = new Fosterer($this->state);

        $this->fosterer
            ->fill($this->state)
            ->user()->associate(auth()->user())
            ->save();

        $this->saveFiles();

        session()->flash('message', 'Your fosterer application has been received successfully');

        event(new FostererApplicationCreated($this->fosterer));

        $this->redirectRoute('home');
    }
}
