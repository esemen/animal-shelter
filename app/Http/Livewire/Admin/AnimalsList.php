<?php

namespace App\Http\Livewire\Admin;

use App\Models\AnimalStatus;
use Livewire\Component;
use Livewire\WithPagination;

class AnimalsList extends Component
{
    use WithPagination;

    public $animalStatus;
    public int $perPage = 10;
    public $sortField = 'incoming';
    public $sortAsc = true;
    public $search = '';

    public function clear()
    {
        return $this->search = '';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function mount($status = null) {
        $this->animalStatus = $status ? AnimalStatus::firstWhere('slug', $status) : null;
    }



    public function render()
    {
        $status = $this->animalStatus;
        return view('livewire.admin.animals-list', [
            'animals' => \App\Models\Animal::search($this->search)
                ->when($status, function ($query) use ($status) {
                    return $query->where('animal_status_id', $status->id);
                })
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ])
            ->extends('layouts.admin')
            ->section('content');
    }
}
