@extends('layouts.app')

@section('content')
    <div class="">
        <div>
{{--            <h3 class="text-center">{{ $page->title }}</h3>--}}

            {!! $page->content !!}
        </div>
    </div>
@endsection
