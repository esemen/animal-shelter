<?php

namespace App\Http\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;

class UserTitleInput extends Component
{
    public string $selectedTitle = '';
    public string $title = '';
    public Collection $availableTitles;

    public function mount() {
        $this->availableTitles = collect(['Mr.', 'Mrs.', 'Ms.', 'Miss']);

        $this->title = old('title', '');
        $this->selectedTitle = $this->availableTitles->contains($this->title) ? $this->title : 'other';
    }

    public function updatedSelectedTitle()
    {
        $this->title = $this->selectedTitle == 'other' ? '' : $this->title = $this->selectedTitle;
    }

    public function render()
    {
        return view('livewire.user-title-input');
    }
}
