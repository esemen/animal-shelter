@extends('layouts.app')

@section('content')
    @include('animals.public.search-form')
    @include('animals.public.search-results')
@endsection

@push('styles')
    <style type="text/css">
        .tabs-wide .tab-content {
            padding:0 !important;
        }
    </style>
@endpush
