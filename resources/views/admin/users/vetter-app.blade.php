@extends('layouts.admin')

@section('content')
    <div class="container">
        <x-users.user-information-card :user="$application->user"/>
        <x-users.vetter-information-card class="mt-4" :application="$application"/>
        <div class="text-center mt-4">
            <span></span>
            <a class="btn btn-primary mr-5" href="{{ route('users.pending') }}"><i class="fa fa-undo"></i> Return</a>
            <form method="post" action="{{ route('users.vetter.approve', ['application' => $application]) }}" class="d-inline">
                @csrf
                @method('put')
                <button class="btn btn-success"><i class="fa fa-check"></i> Approve</button>
            </form>
            <form method="post" action="{{ route('users.vetter.reject', ['application' => $application]) }}" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger"><i class="fa fa-close"></i> Reject</button>
            </form>
        </div>
    </div>
@endsection
