@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2 class="text-center mb-4">MTAR Admin Panel</h2>

        <div class="d-flex">
            <div class="flex-row flex-fill">
                @can('animal.view')
                    <x-dashboard-widget label="Animals on site">
                        <p class="display-1">{{ $animalCount }}</p>
                        <a href="{{ route('animals.bystatus', ['status' => 'pending']) }}" class="btn btn-primary">View Animals</a>
                    </x-dashboard-widget>
                @endcan
                @can('application.view')
                    <x-dashboard-widget label="Applications">
                        <p class="display-1">{{ $applicationCount }}</p>
                        <a href="{{ route('applications.bystatus', ['status' => 'new']) }}" class="btn btn-primary">View Applications</a>
                    </x-dashboard-widget>
                @endcan
                @can('user.view')
                    <x-dashboard-widget label="Users">
                        <p class="display-1">{{ $userCount }}</p>
                        <a href="{{ route('users') }}" class="btn btn-primary">View Users</a>
                    </x-dashboard-widget>
                @endcan
                @can('vetter.home-check')
                    <x-dashboard-widget label="Pending Home Checks">
                        <p class="display-1">{{ $homeChecksCount }}</p>
                        <a href="{{ route('home-checks.index') }}" class="btn btn-primary">Pending Home Checks</a>
                    </x-dashboard-widget>
                @endcan
            </div>
        </div>
    </div>
@endsection
