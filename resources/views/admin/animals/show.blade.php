@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body position-relative">
                <span class="position-absolute" style="top:8px; right:8px">
                    @can('animal.edit')
                        <a href="{{ route('animals.edit', ['animal' => $animal]) }}" class="btn btn-sm btn-primary ml-3 px-2 py-1"><i class="fa fa-pencil" title="Edit"></i></a>
                    @endcan
                </span>
                <h2>
                    {{ $animal->name }}

                </h2>
                <h3>
                    <span class="pull-right text-porcelain">{{ $animal->type->type }}</span>
                    <i class="fa fa-paw"></i> {{ $animal->breed }}
                </h3>
                <hr class="my-3">

                <!-- Basic Info -->
                <div class="row">
                    <div class="col-md-6">
                        <x-field-inline label="Gender">{{ $animal->sex }}</x-field-inline>
                        <x-field-inline label="DOB / Age">{{ formatDate($animal->dob) }} ({{ $animal->ageText }})
                        </x-field-inline>
                        <x-field-inline label="Colour">{{ $animal->colour }}</x-field-inline>
                        <x-field-inline label="Arrival Date">{{ formatDate($animal->incoming) }}</x-field-inline>
                        <x-field-inline label="Status">{{ $animal->status->name }}</x-field-inline>
                    </div>
                    <div class="col-md-6">
                        <x-field-inline label="Passport">{{ $animal->passport }}</x-field-inline>
                        <x-field-inline label="Microchip 1">{{ $animal->microchip1 }}</x-field-inline>
                        <x-field-inline label="Microchip 2">{{ $animal->microchip2 }}</x-field-inline>
                        <x-field-inline label="Chip Company">{{ $animal->chip_company }}</x-field-inline>
                        <x-field-inline label="Update Chip">{{ $animal->update_chip ? 'Yes' : 'No' }}</x-field-inline>
                    </div>
                </div>

                <hr class="my-3">

                <!-- Medical Info -->
                <div class="row">
                    <div class="col-md-6">
                        <x-field-inline label="Weight">{{ $animal->weight ?? '-' }} Kg</x-field-inline>
                        <x-field-inline label="First Jab">{{ formatDate($animal->first_jab) }}</x-field-inline>
                        <x-field-inline label="Second Jab">{{ formatDate($animal->second_jab) }}</x-field-inline>
                        <x-field-inline label="Booster">{{ formatDate($animal->booster_due) }}</x-field-inline>
                        <x-field-inline label="First Rabies">{{ formatDate($animal->first_rabies) }}</x-field-inline>
                        <x-field-inline label="Second Rabies">{{ formatDate($animal->second_rabies) }}</x-field-inline>
                    </div>
                    <div class="col-md-6">
                        <x-field-inline label="Kennel Cough">{{ formatDate($animal->kennel_cough) }}</x-field-inline>
                        <x-field-inline label="Fleaed">{{ formatDate($animal->fleaed) }}</x-field-inline>
                        <x-field-inline label="Wormed">{{ formatDate($animal->wormed) }}</x-field-inline>
                        <x-field-inline label="Neutered">{{ formatDate($animal->neutered) }}</x-field-inline>
                        <x-field-inline label="Neuter Due">{{ formatDate($animal->neuter_due) }}</x-field-inline>
                        <x-field-inline label="Stitches Out">{{ formatDate($animal->stitches_out) }}</x-field-inline>
                    </div>
                </div>

                <hr class="my-3">

                <div class="row my-4">
                    @foreach (config('mtar.animal_attributes.dogs') as $key => $attribute)
                        <div class="col col-lg-2 col-md-4 col-sm-6">
                            <span class="{{ $animal->attributes[$key] ?? 0 ? 'text-success text-bold' : null }}">
                            <i class="fa {{ $animal->attributes[$key] ?? 0 ? 'fa-check-square' : 'fa-square' }}"></i>
                            {{ $attribute['label'] }}
                            </span>

                        </div>
                    @endforeach
                </div>

                <hr class="my-3">

                <!-- Location -->
                <div class="row mt-2">
                    <h5 class="col-12 mb-3">
                        <i class="fa fa-map-marker"></i> Location
                    </h5>
                    <div class="col-md-6">
                        <x-field-inline label="Name">{{ $animal->location->full_name ?? '-' }}</x-field-inline>
                    </div>
                    <div class="col-md-6">
                        <x-field-inline label="Address">{{ $animal->location->full_address ?? '-' }}</x-field-inline>
                    </div>
                </div>

                <hr class="my-3">

                <!-- Photos -->
                <div class="row mt-2">
                    <h5 class="col-12 mb-3">
                        <i class="fa fa-photo"></i> Photos
                    </h5>

                    <div class="col d-flex flex-row flex-wrap animal-thumbs">
                        @forelse(collect($animal->images) as $image)
                            <div class="flex-fill mb-4 mx-2 p-2 text-center">
                                <img src="{{ url('storage/' . config('mtar.animal_image_path') . '/' . $image) }}">
                            </div>
                        @empty
                            <div class="flex-fill mb-4 mx-2 p-2 text-center">
                                No photos found
                            </div>
                        @endforelse
                    </div>
                </div>

                <hr class="my-3">

                <!-- Texts -->
                <x-field-long-text label="Description">
                    {!! $animal->description !!}
                </x-field-long-text>
                <hr class="my-3">
                <x-field-long-text label="Short Description">
                    {!! $animal->short_description !!}
                </x-field-long-text>
                <hr class="my-3">
                <x-field-long-text label="Booking Information">
                    {!! $animal->booking_info !!}
                </x-field-long-text>
                <hr class="my-3">
                <x-field-long-text label="Medical Notes">
                    {!! $animal->medical_note !!}
                </x-field-long-text>
                <hr class="my-3">
                <x-field-long-text label="Assessment Notes">
                    {!! $animal->assessment_note !!}
                </x-field-long-text>
                <hr class="my-3">
                <x-field-long-text label="Other Notes">
                    {!! $animal->other_note !!}
                </x-field-long-text>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style type="text/css">
        .animal-thumbs img {
            height: 120px;
            width: auto;
        }
    </style>
@endpush
