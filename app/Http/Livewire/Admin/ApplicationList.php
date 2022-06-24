<?php

namespace App\Http\Livewire\Admin;

use App\Models\Application;
use App\Models\ApplicationStatus;
use Livewire\Component;
use Livewire\WithPagination;

class ApplicationList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    protected $applications;
    public $applicationStatus;

    public int $perPage = 10;
    public $sortField = 'created_at';
    public $sortAsc = true;
    public $search = '';

    public function clear()
    {
        return $this->search = '';
    }

    public function mount($status = null)
    {
        $this->applicationStatus = $status ? ApplicationStatus::firstWhere('slug', $status) : null;
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

    public function updating($value, $name)
    {
        $this->resetPage();
    }

    public function render()
    {
        $status = $this->applicationStatus;

        $applications = $this->applications = Application::search($this->search)
                        ->when($status, function ($query) use ($status) {
                            return $query->where('application_status_id', $status->id);
            })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin.application-list', [
            'applications' => $applications,
        ])
            ->extends('layouts.admin')
            ->section('content');
    }


}
