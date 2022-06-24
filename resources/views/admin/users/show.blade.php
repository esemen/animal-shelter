@extends('layouts.admin')

@section('content')
    <div class="container">
        <x-users.user-information-card :user="$user" />
        <div class="text-center mt-4">
            <a class="btn btn-primary" href="{{ route('users') }}"><i class="fa fa-undo"></i> Return to User List</i> </a>
        </div>
    </div>
@endsection
