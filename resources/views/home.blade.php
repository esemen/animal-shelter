@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center position-relative">
                            <strong>{{ __('Welcome to your MTAR account - ')}}{{Auth::user()->fullName }}</strong>

                            <div class="float-right">
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('profile') }}" class="mr-4">Edit Profile</a>
                                    <a href="{{ route('logout') }}"
                                       onclick="$(this).closest('form').submit(); return false;" class="text-danger">Log
                                        out</a>
                                </form>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body pb-4">
                        <div class="range range-sm-top spacing-20">
                            <div class="cell-sm-12" style="text-align: center"><h5>Your personal details</h5></div>
                            <div class="cell-sm-6">
                                <p><strong>{{ __('First Name: ')}}</strong>{{Auth::user()->first_name }}</p>
                                <p><strong>{{ __('Last Name: ')}}</strong>{{Auth::user()->last_name }}</p>
                                <p><strong>{{ __('Landline: ')}}</strong>{{Auth::user()->landline }}</p>
                                <p><strong>{{ __('Mobile: ')}}</strong>{{Auth::user()->mobile }}</p>
                                <p><strong>{{ __('Email: ')}}</strong>{{Auth::user()->email }}</p>
                            </div>
                            <div class="cell-sm-6">
                                <p><strong>{{ __('House Name/No.: ')}}</strong>{{Auth::user()->house_no}}</p>
                                <p><strong>{{ __('Address Line 1: ')}}</strong>{{Auth::user()->address1 }}</p>
                                <p><strong>{{ __('Address Line 2: ')}}</strong>{{Auth::user()->address2 }}</p>
                                <p><strong>{{ __('Address Line 3: ')}}</strong>{{Auth::user()->address3 }}</p>
                                <p><strong>{{ __('Town: ')}}</strong>{{Auth::user()->town }}</p>
                                <p><strong>{{ __('County: ')}}</strong>{{Auth::user()->county }}</p>
                                <p><strong>{{ __('Postcode: ')}}</strong>{{Auth::user()->postcode }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- List applications --}}
                    <div class="card">
                        <div class="card-header text-center">
                            <h4><strong>Please see below your applications</strong></h4>
                        </div>
                        <div class="card-body">
                            @forelse ($applications as $application)
                                <div class="row mb-4">
                                    <div class="col-sm-4 col-md-3 text-center">
                                        @if(count($application->animal->images))
                                            <img class="img-fluid"
                                                 src="{{ asset('storage/' . config('mtar.animal_image_path')  . '/' .  $application->animal->images[0]) }}"
                                                 alt="{{ $application->animal->name}}">
                                        @endif
                                    </div>

                                    <div class="col-sm-8 col-md-9">
                                        <div class="row">
                                            <div class="col-6">
                                                <p>
                                                    <strong>{{ __('Name: ')}}</strong>{{$application->animal->name }}
                                                    <br>
                                                    <strong>{{ __('Breed: ')}}</strong>{{$application->animal->breed }}
                                                    <br>
                                                    <strong>{{ __('Age: ')}}</strong>{{$application->animal->age }}
                                                </p>
                                                <p>
                                                    <a style="border:1px solid; padding: 10px"
                                                       href="{{ route('pet.show',['name' => $application->animal->name, 'animal' => $application->animal]) }}">
                                                        See pet details</a>
                                                </p>
                                            </div>
                                            <div class="col-6">
                                                <p>Status : {{ $application->status->name }}</p>
                                                @if($application->status->published)
                                                    <a href="{{ route('application.show', $application) }}"
                                                       class="btn btn-xs btn-primary btn-primary-outline mt-2">View application</a>
                                                @else
                                                    <a href="{{ route('application.form', $application) }}"
                                                       class="btn btn-xs btn-primary mt-2">Complete application</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center">
                                    <h5 class="p-5">No application found</h5>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- Animals in foster --}}
                    @if($animals_in_foster->count())
                        <div class="card">
                            <div class="card-header text-center">
                                <h4><strong>Please see below the animals in foster</strong></h4>
                            </div>
                            <div class="card-body">
                                @forelse ($animals_in_foster as $animal)
                                    <div class="row mb-4">
                                        <div class="col-sm-4 col-md-3 text-center">
                                            @if(count($animal->images))
                                                <img class="img-fluid"
                                                     src="{{ asset('storage/' . config('mtar.animal_image_path')  . '/' .  $animal->images[0]) }}"
                                                     alt="{{ $animal->name}}">
                                            @endif
                                        </div>
                                        <div class="col-sm-8 col-md-9">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>
                                                        <strong>{{ __('Name: ')}}</strong>{{ $animal->name }}
                                                        <br>
                                                        <strong>{{ __('Breed: ')}}</strong>{{ $animal->breed }}
                                                        <br>
                                                        <strong>{{ __('Age: ')}}</strong>{{ $animal->age }}
                                                    </p>
                                                    <p>
                                                        <a style="border:1px solid; padding: 10px"
                                                           href="{{ route('pet.show',['name' => $animal->name, 'animal' => $animal]) }}">
                                                            See pet details</a>
                                                    </p>
                                                </div>
                                                <div class="col-6">
                                                    <p>Assessment forms:</p>
                                                    <a href="{{ route('assessment-form', ['name' => $animal->name, 'animal' => $animal]) }}"
                                                       class="btn btn-xs btn-primary mt-2">Complete assessment form</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center">
                                        <h5 class="p-5">No animal found</h5>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @endif
                        {{--Fosterer Applications--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header text-center">--}}
{{--                            <h4><strong>Please see below your fosterer applications</strong></h4>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            @forelse ($fosterer_applications as $fosterer_application)--}}
{{--                                <div class="row mb-4">--}}
{{--                                    <div class="col-sm-8 col-md-9">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-6">--}}
{{--                                                <p>--}}
{{--                                                    <strong>{{ __('Form ID: ')}}</strong>{{$fosterer_application->id}}--}}
{{--                                                </p>--}}

{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @empty--}}
{{--                                <div class="text-center">--}}
{{--                                    <h5 class="p-5">No application found</h5>--}}
{{--                                </div>--}}
{{--                            @endforelse--}}
{{--                        </div>--}}

                        {{--Vetter Applications--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header text-center">--}}
{{--                                <h4><strong>Please see below the vetter applications</strong></h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                @forelse ($vetter_applications as $vetter)--}}
{{--                                    <div class="row mb-4">--}}
{{--                                        <div class="col-sm-8 col-md-9">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6">--}}
{{--                                                    <p>--}}
{{--                                                        <strong>{{ __('Form ID: ')}}</strong>{{$vetter->id}}--}}
{{--                                                    </p>--}}

{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @empty--}}
{{--                                    <div class="text-center">--}}
{{--                                        <h5 class="p-5">No animal found</h5>--}}
{{--                                    </div>--}}
{{--                                @endforelse--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        {{--Home Checks--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header text-center">--}}
{{--                                <h4><strong>Please see below the completed home checks</strong></h4>--}}
{{--                            </div>--}}
{{--                            <div class="card-body">--}}
{{--                                @forelse ($home_checks as $home_check)--}}
{{--                                    <div class="row mb-4">--}}
{{--                                        <div class="col-sm-8 col-md-9">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6">--}}
{{--                                                    <p>--}}

{{--                                                        <strong>{{ __('Home check ids: ')}}</strong>{{$home_check->id}}--}}
{{--                                                    </p>--}}

{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @empty--}}
{{--                                    <div class="text-center">--}}
{{--                                        <h5 class="p-5">No home checks done</h5>--}}
{{--                                    </div>--}}
{{--                                @endforelse--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        {{--Assessment forms--}}
                        @if($assessments->count())
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4><strong>Please see below the completed assessment forms</strong></h4>
                                </div>
                                <div class="card-body">
                                    @forelse ($assessments as $assessment)
                                        <div class="row mb-4">
                                            <div class="col-sm-8 col-md-9">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p>

                                                            <strong>{{ __('Assessment ids: ')}}</strong>{{$assessment->id}}
                                                        </p>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center">
                                            <h5 class="p-5">No assessment form found</h5>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        @endif
                    </div>
@endsection
