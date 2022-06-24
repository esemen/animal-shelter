@extends('layouts.admin')

@section('content')
    <div class="container">
        <x-users.user-roles-card :user="$user" :roles="$roles" />
    </div>
@endsection
