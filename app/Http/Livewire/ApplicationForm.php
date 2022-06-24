<?php

namespace App\Http\Livewire;

use App\Events\AdoptionApplicationCreated;
use App\Models\Application;
use App\Models\ApplicationStatus;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;


class ApplicationForm extends Component
{
    use WithFileUploads;

    public array $state;
    public Application $application;

    public $propertySelect;
    public $exerciseSelect;
    public $foundSelect;

    public $rentalAgreement;
    public $employerVerification;

    public function validateState()
    {
        $this->validate([
            'state.confirmation.procedure' => 'accepted',
            'state.reason' => 'required',
            'state.applied_before' => 'required',
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
            'state.care.not_able_to_care' => 'required',
            'state.care.puppy_neuter' => 'required',
            'state.care.puppy_not_neuter' => 'required_if:state.care.puppy_neuter,no',
            'state.care.puppy_training' => 'required',
            'state.care.vet_contact' => 'required',
            'state.care.insurance' => 'required',
            'state.plans.holiday' => 'required',
            'state.plans.move' => 'required',
            'state.plans.collect' => 'required',
            'state.found_through' => 'required',
            'state.confirmations.live' => 'accepted',
            'state.confirmations.payment' => 'accepted',
            'state.confirmations.privacy' => 'accepted',
            'state.confirmations.microchip' => 'accepted',
        ], [
            'accepted' => 'You have to confirm',
            'required' => 'This field is required',
            'required_if' => 'This field is required',
            'required_unless' => 'This field is required',
            'rentalAgreement.required_if' => 'Please upload your rental agreement as PDF file',
            'employerVerification.required_if' => 'Please upload your employer verification as PDF file',
        ]);

        return $this;
    }

    public function mount()
    {
        // User check
        if (! auth()->user()->is($this->application->user)) {
            abort(403);
        }

        // Status check
        if ($this->application->status->published) {
            $this->redirectRoute('application.show', ['application' => $this->application]);
        }

        // Load state
        $this->state = $this->application->withoutRelations()->toArray();

        // Load property type (Other or selected value)
        $other = ($this->application->property['type'] ?? null) && !collect(config('mtar.application_form.options.property.type'))->contains($this->application->property['type']);
        $this->propertySelect = $other ? "Other" : $this->application->property['type'] ?? null;

        // Load exercise areas (Other or selected value)
        $other = ($this->application->care['exercise_areas'] ?? null) && !collect(config('mtar.application_form.options.care.exercise_areas'))->contains($this->application->care['exercise_areas']);
        $this->exerciseSelect = $other ? "Other" : $this->application->care['exercise_areas'] ?? null;

        // Load found site through areas (Other or selected value)
        $other = ($this->application->found_through ?? null) && !collect(config('mtar.application_form.options.found_through'))->contains($this->application->found_through);
        $this->foundSelect = $other ? "Other" : $this->application->found_through ?? null;
    }


    public function render()
    {
        // dog, cat, other
        $animalType = $this->application->animal->type->type;
        $viewName = 'livewire.application-form-' . $animalType;

        return view($viewName)
            ->extends('layouts.app')
            ->section('content');
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

    private function prepareState()
    {
        $this->state['property']['type'] = $this->propertySelect === 'Other' ? $this->state['property']['type'] ?? null : $this->propertySelect;
        $this->state['care']['exercise_areas'] = $this->exerciseSelect === 'Other' ? $this->state['care']['exercise_areas'] ?? null : $this->exerciseSelect;
        $this->state['found_through'] = $this->foundSelect === 'Other' ? $this->state['found_through'] ?? null : $this->foundSelect;

        return $this;
    }

    private function saveForm()
    {
        $this->prepareState();

        $this->application
            ->fill($this->state)
            ->save();

        return $this;
    }

    private function saveFiles()
    {
        $filePath = config('mtar.application_upload_path');
        $uploads = [];

        // Rental Agreement
        if ($this->application->property['ownership'] === 'rent') {
            $fileName = Str::uuid() . '.' . $this->rentalAgreement->getClientOriginalExtension();

            $this->rentalAgreement->storeAs($filePath, $fileName);

            $uploads['rental_agreement'] = [
                'filename' => $fileName,
                'original' => $this->rentalAgreement->getClientOriginalName()
            ];
        }

        // Employer Verification
        if ($this->application->occupation['wfh'] === 'yes') {
            $fileName = Str::uuid() . '.' . $this->employerVerification->getClientOriginalExtension();

            $this->employerVerification->storeAs($filePath, $fileName);

            $uploads['employer_verification'] = [
                'filename' => $fileName,
                'original' => $this->employerVerification->getClientOriginalName()
            ];
        }

        // Persist the record
        if ($uploads) {
            $this->application->fill(['uploads' => $uploads])->save();
        }

        return $this;
    }

    public function saveDraft()
    {
        $this->saveForm();

        $this->emit('draftSaved');
    }

    public function setStatus()
    {
        $this->application->status()->associate(ApplicationStatus::where('slug','new')->first());
        $this->application->save();

        return $this;
    }

    public function saveApplication()
    {
        $this
            ->saveForm()
            ->validateState()
            ->saveFiles()
            ->setStatus();

        session()->flash('message','Your application stored successfully');

        event(new AdoptionApplicationCreated($this->application));

        return $this->redirectRoute('home');
    }
}
