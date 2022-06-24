@props([
    'user' => null,
])

<div class="card">
    <div class="card-body position-relative">
        <h2>
            {{ $user->fullname }}
        </h2>

        <hr class="my-3">

        <div class="row mt-2">
            <h5 class="col-12 mb-3">
                <i class="fa fa-user"></i> User Information
            </h5>
            <div class="col-md-6">
                <x-field-inline label="House No">{{ $user->house_no }}</x-field-inline>
                <x-field-inline label="Address 1">{{ $user->address1 }}</x-field-inline>
                <x-field-inline label="Address 2">{{ $user->address2 }}</x-field-inline>
                <x-field-inline label="Address 3">{{ $user->address3 }}</x-field-inline>
                <x-field-inline label="Town">{{ $user->town }}</x-field-inline>
                <x-field-inline label="County">{{ $user->county }}</x-field-inline>
                <x-field-inline label="Postcode">{{ $user->postcode }}</x-field-inline>
            </div>
            <div class="col-md-6">
                <x-field-inline label="Email">{{ $user->email }}</x-field-inline>
                <x-field-inline label="Mobile">{{ $user->mobile }}</x-field-inline>
                <x-field-inline label="Landline">{{ $user->landline }}</x-field-inline>
                <x-field-inline label="Registration">{{ formatDate($user->created_at) }}</x-field-inline>
            </div>
        </div>
    </div>
</div>
