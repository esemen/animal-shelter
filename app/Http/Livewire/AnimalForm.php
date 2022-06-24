<?php

namespace App\Http\Livewire;

use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\User;
use App\Services\Avid;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Validator;

class AnimalForm extends Component
{
    use WithFileUploads;

    public $stateId;

    public $animal;
    public $location;
    public $breeds;

    public $animalTypes;
    public $state;
    public $animalAttributesDogs;
    public $animalAttributesCats;
    public $locationSearchTerm;

    public $upload;
    public $imageList;

    protected $rules = [
        'state.animal_type_id' => ['required'],
        'state.dob' => ['nullable', 'date'],
        'state.name' => ['required', 'string', 'max:255'],
        'state.sex' => ['required', 'in:Male,Female'],
        'state.weight' => ['nullable', 'numeric', 'min:0'],
        'state.microchip1' => ['nullable', 'alpha_num', 'min:15', 'max:15'],
        'state.microchip2' => ['nullable', 'alpha_num', 'min:15', 'max:15'],
        'location' => ['required'],
        'upload.*' => 'image|max:4096'
    ];

    public function mount()
    {
        if (!$this->animal) {
            $this->animal = new Animal();
            $this->animal->incoming = now();
            $this->animal->first_jab = now();
            $this->animal->wormed = now();
        }

        $this->location = $this->animal->location;
//        dd($this->location);

        $this->imageList = collect($this->animal->images);

        $this->animalAttributesDogs = config('mtar.animal_attributes.dogs');
        $this->animalAttributesCats = config('mtar.animal_attributes.cats');

        $this->animalTypes = AnimalType::all();

        $this->breeds = Animal::select('breed')
            ->where('animal_type_id', $this->animal->animal_type_id)
            ->whereNotNull('breed')
            ->orderBy('breed')
            ->get()
            ->pluck('breed')
            ->unique()
            ->toArray();

        $this->state = $this->animal ? $this->animal->withoutRelations()->toArray() : $this->animal;
    }

    public function getIsNewProperty(): bool
    {
        return !isset($this->animal->id);
    }

    public function getAgeProperty()
    {
        return (!isset($this->state['dob']) || $this->state['dob'] === '') ? null : Carbon::parse($this->state['dob'])->longAbsoluteDiffForHumans();
    }

    protected function handleUploads()
    {
        foreach ($this->upload as $image) {
            $fileName = Str::uuid() . '.' . $image->extension();
            $image->storeAs(config('mtar.animal_image_path'), $fileName, 'public');
            $this->imageList->push($fileName);
        }
    }

    public function createAnimal()
    {
        $this->validate([
            'state.animal_type_id' => ['required'],
            'state.name' => ['required', 'string', 'max:255'],
            'state.sex' => ['required', 'in:Male,Female']
        ]);

        $this->animal->fill($this->state);

        $this->animal->type()->associate($this->state['animal_type_id']);
        $this->animal->location()->associate($this->location);


        $this->animal->save();

        $this->redirectRoute('animals.edit', $this->animal);
    }

    public function saveAnimal()
    {
        $this->state = collect($this->state)->map(fn($value) => $value === '' ? null : $value)->toArray();

        $data = $this->getDataForValidation($this->rules);

        $state = $this->state;
        $location = $this->location;
        $animal = $this->animal;

//        Validator::make($data, $this->rules)
//            ->after(function ($validator) use ($state, $animal, $location) {
//                // Check if the data has been changed
//                if ($state['microchip1'] === $animal->microchip1) {
//                    return;
//                }
//
//                $avid = resolve(Avid::class);
//
//                $result = $avid->register([
//                    'microchip' => $state['microchip1'],
//                    'petspecies' => $animal->type->species,
//                    'petbreed' => $state['breed'],
//                    'postcode' => $location->postcode,
//                    'address1' => Str::substr($location->address1,0,50),
//                    'address2' => Str::substr($location->address2,0,50),
//                    'address3' => Str::substr($location->address3,0,50),
//                ]);
//
//                /**
//                 * Status Codes
//                 * 000 Test Purpose
//                 * 001 Registered
//                 * 002 Already registered
//                 */
//                if (!$result || !collect(['000', '001', '002'])->contains($avid->statusCode())) {
//                    $validator->errors()->add(
//                        'microchip1', $avid->statusMessage()
//                    );
//                }
//            })->validate();


        $this->animal->fill($this->state);

        if (is_array($this->upload)) {
            $this->handleUploads();
        }

        $this->animal->status()->associate($this->state['animal_status_id']);
        $this->animal->location()->associate($this->location);
        $this->animal->images = $this->imageList->toArray();

        $this->animal->save();

        $this->redirectRoute('animals.show', ['animal' => $this->animal]);
    }

    public function clearLocation()
    {
        $this->location = null;
    }

    public function setLocation($email)
    {
        $this->location = User::where('email', $email)->firstOrFail();
    }

    public function getSearchLocationProperty()
    {
        if (strlen(Str::slug($this->locationSearchTerm)) > 2) {
            return User::where('search_key', 'like', '%' . Str::slug($this->locationSearchTerm) . '%')
                ->limit(500)
                ->get();
        } else {
            return [];
        }
    }

    public function setCover($image)
    {
        if ($this->imageList->contains($image)) {
            $this->imageList = $this->imageList->filter(fn($item) => $item !== $image);
            $this->imageList->prepend($image);
        }
    }

    public function deleteImage($image)
    {
        $animal = Animal::find($this->animal->id);

        $images = collect($animal->images);

        if ($images->contains($image)) {
            if (Storage::disk('public')->delete(config('mtar.animal_image_path') . '/' . $image)) {
                $images = $images->filter(fn($item) => $item !== $image);

                $animal->images = $images;

                $animal->save();

                $this->imageList = $images;
                $this->animal = $animal;
            }
        }
    }

    public function updated($fieldName)
    {
        $this->validateOnly($fieldName);
    }

    public function dehydrate()
    {
        $this->emit('initialiseComponents');
    }

    public function render()
    {
        return view('livewire.animal-form');
    }
}
