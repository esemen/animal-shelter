@props([
    'application' => null,
])

<div {{ $attributes->exceptProps(['application'])->merge(['class' => 'card']) }}>
    <div class="card-body position-relative">
        <h5 class="d-block mb-3">
            <i class="fa fa-file"></i> Vetter Application Form
        </h5>
        <x-field-inline title-width="5"
                        label="1. How many miles are you willing to travel to do a Home vet?">{{ $application->jsonValue('travel') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="2. When are you available to carry out a home check?">{{ $application->jsonValue('home_check') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="3. Do you have your own transport?">{{ $application->jsonValue('transport') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="4. Do you currently or have you ever owned dogs?">{{ $application->jsonValue('own_dog') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="5. Other rescues you have home vetted for:">{{ $application->jsonValue('other_rescues') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="6. Name and date of the dog(s) you adopted from Many Tears:">{{ $application->jsonValue('dogs_adopted') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="7. Additional Information:">{{ $application->jsonValue('additional_info') }}</x-field-inline>
    </div>
</div>
