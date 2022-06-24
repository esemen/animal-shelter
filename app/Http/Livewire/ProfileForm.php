<?php

namespace App\Http\Livewire;

use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use App\Services\Geocode;
use Livewire\Component;

class ProfileForm extends Component
{
    public array $state = [];
    public $user = [];
    private $postcodes = [];
    public string $selectedTitle = '';

    protected $listeners = ['addressSelected'];

    protected $rules = [
        'state.title' => ['required', 'string', 'max:10'],
        'state.first_name' => ['required', 'string', 'min:2'],
        'state.last_name' => ['required', 'string', 'min:2'],
        'state.mobile' => ['required', 'numeric', 'digits_between:11,20'],
        'state.landline' => ['nullable', 'numeric', 'digits_between:11,20'],
        'state.postcode' => ['required', 'regex:/(^[\pL0-9 ]+)$/u', 'min:3']
    ];

    protected $messages = [
        'numeric' => 'This field should be numeric',
        'digits_between' => 'This field should be minimum :min digits',
        'required' => 'This field is mandatory',
        'regex' => 'The format is invalid'
    ];

    public function mount()
    {
        $this->state = auth()->user()->withoutRelations()->only([
            'title',
            'first_name',
            'last_name',
            'postcode',
            'house_no',
            'address1',
            'address2',
            'address3',
            'town',
            'county',
            'landline',
            'mobile',
        ]);

        $this->availableTitles = collect(['Mr.', 'Mrs.', 'Ms.', 'Miss']);

        $this->selectedTitle = $this->availableTitles->contains($this->state['title']) ? $this->state['title'] : 'Other';
    }

    public function render()
    {
        return view('livewire.profile-form');
    }

    public function addressSelected($addressParts)
    {
        $this->state['postcode'] = $addressParts['postcode'] ?? null;
        $this->state['address1'] = $addressParts['address1'] ?? null;
        $this->state['address2'] = $addressParts['address2'] ?? null;
        $this->state['address3'] = $addressParts['address3'] ?? null;
        $this->state['town'] = $addressParts['town'] ?? null;
    }

    public function updatedSelectedTitle()
    {
        $this->state['title'] = $this->selectedTitle == 'Other' ? '' : $this->state['title'] = $this->selectedTitle;
    }

    public function updateProfile()
    {
        // Standard Validation
        $this->validate();

        // Validate postcode if changed
        $coordinates = null;
        if ($this->state['postcode'] <> auth()->user()->postcode) {

            $this->validate([
                'state.postcode' => [
                    'required',
                    function ($attribute, $value, $fail) use (&$coordinates) {
                        $geocode = resolve(Geocode::class);
                        if ($geocode->loadAddress($value) && $geocode->getTypes()->contains('postal_code')) {
                            $coordinates = $geocode->getCoordinates();
                            return true;
                        }
                        $fail('Invalid postcode value');
                        return false;
                    }]
            ]);
        }

        if ($coordinates) {
            auth()->user()
                ->fill([
                    'latitude' => $coordinates->lat,
                    'longitude' => $coordinates->lng,
                ]);
        }

        auth()->user()->fill($this->state)
            ->clearApproval()
            ->save();

        session()->flash('status', 'Profile successfully updated');

        $this->redirectRoute('home');

    }
}
