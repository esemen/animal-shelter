<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;


class UsersList extends Component
{
    use WithPagination;

    public int $perPage = 10;
    public $sortField = 'created_at';
    public $sortAsc = true;
    public $search = '';

    protected $paginationTheme = 'simple-bootstrap';

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


    public function render()
    {
        return view('livewire.admin.users-list', [
            'users' => \App\Models\User::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
        ])
            ->extends('layouts.admin')
            ->section('content');
    }

//    public function setPage($url)
//    {
//        $this->currentPage = explode('page=', $url)[1];
//        Paginator::currentPageResolver(function(){
//            return $this->currentPage;
//        });
//    }
}
