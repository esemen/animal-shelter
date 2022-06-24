@props([
    'application' => null,
])

<div {{ $attributes->exceptProps(['application'])->merge(['class' => 'card']) }}>
    <div class="card-body position-relative">
        <h5 class="d-block mb-3">
            <i class="fa fa-file"></i> Fosterer Application Form
        </h5>
        <x-field-inline title-width="5"
                        label="1. Name, date and details of any dogs you have already applied for or
          adopted from Many for in the past or type none in the box">{{ $application->jsonValue('experience.applied_before') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="2. Have you fostered before?">{{ $application->jsonValue('experience.fostered_before') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="If so please list the names of the rescues you have
            fostered for including Many Tears if we are one of them." class="form-control {{ ($application->jsonValue('experience.fostered_before') ?? '') === 'Yes' ? null : 'hidden' }}">{{ $application->jsonValue('experience.fostered_before') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="3. Are you planning to start fostering immediately or in the future?">{{ $application->jsonValue('fostering.start') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="4. Are you happy to continuing fostering if you adopt the first dog you foster?">{{ $application->jsonValue('fostering.continue') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="5. Do you have your own transport?">{{ $application->jsonValue('fostering.transport') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="6. Where are you able to collect you foster dog from?">{{$application->collection}}
        </x-field-inline>
        <x-field-inline title-width="5"
                        label="7. If you are unable to collect from any of the above please,
    we also occasionally have foster runs going north and up to Scotland.
    Please give details of the service station closest to Many Tears you are able to travel to.">{{ $application->jsonValue('fostering.closest') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="8. What type of property do you live in?">{{ $application->jsonValue('property.type') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="9. Do you own or rent your home?">{{ $application->jsonValue('property.ownership') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="Rent agreement document" class="form-control {{ ($application->jsonValue('property.ownership') ?? '') === 'Rent' ? null : 'hidden' }}">{{ $application->jsonValue('uploads') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="10. What size is your garden? Please note your garden MUST
                            be secure or you must have a secure
                            area for the dog to go out in.">{{ $application->jsonValue('garden.size') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="11. Is your back garden separate from your front garden?">{{ $application->jsonValue('garden.separate') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="12. Do you have a communal garden or does anyone have access to the garden other than you and your family?">{{ $application->jsonValue('garden.communal') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="13. What is the height of your fencing at its lowest point?">{{ $application->jsonValue('garden.fence') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="14. Do you have any pools or ponds and if so are they covered/enclosed?">{{ $application->jsonValue('garden.pool') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="15. Do you have a dog kennel/run in your garden?">{{ $application->jsonValue('garden.kennel') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="16. Please give the ages of any children (aged under 18) living in the property">
{{--                            @forelse($application->jsonValue('occupants.children') as $kid)--}}
{{--                                {{$kid . " years"}} @if(!($loop->last)){{","}}@endif--}}
{{--                                @empty--}}
{{--                                0--}}
{{--                            @endforelse--}}
        </x-field-inline>

        <x-field-inline title-width="5"
                        label="17.	Do you have people visiting with children visiting regularly?">{{ $application->jsonValue('occupants.visitor') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="18. Please give the ages of all the adults (aged 18 and over) who live at the property.">
                        @foreach($application->jsonValue('occupants.adults') as $adult)
                            {{$adult. " years"}} @if(!($loop->last)){{","}}@endif
                        @endforeach
        </x-field-inline>
        <x-field-inline title-width="5"
                        label="19. Please give the occupation and the working hours that
                            each adult in the home will be working for the next 3 weeks">{{ $application->jsonValue('occupation.working_hours') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="20. Do you work from home?">{{ $application->jsonValue('occupation.wfh') }}</x-field-inline>

        <x-field-inline title-width="5"
                        label="21. If you work from home where is the dog kept when you are working?">{{ $application->jsonValue('occupation.wfh_kept') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="22. What is the longest time in TOTAL in any one day (i.e. within a 24 hr period) that a dog would be left?">{{ $application->jsonValue('occupation.hours_left') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="23. How many times a week would a dog be left for the time selected above?">{{ $application->jsonValue('occupation.days_left') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="24. What dogs have you owned in the past?">{{ $application->jsonValue('experience.past_animals') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="25. What other animals currently live in your house. Please include breed, sex and age of animals?">{{ $application->jsonValue('experience.other_animals') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="26. Does the resident dog(s) regularly socialise with other dogs? For example, in the park or when out on walks.">{{ $application->jsonValue('experience.resident_dogs') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="27. Are any of the dogs currently living in your home reactive with other dogs or have any known behavioural issues?">{{ $application->jsonValue('experience.reactive_dogs') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="Please give details of why you have answered yes and how you manage any issues.">{{ $application->jsonValue('experience.experience.dog_issues') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="28. If you already own dogs/cats are they all spayed/neutered?">{{ $application->jsonValue('care.neutered') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="If you've answered no to the above question, please give the reason why.">{{ $application->jsonValue('care.not_neutered') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="29. Are all animals you own inoculated annually and will you continue to inoculate the dog you want to adopt? You will be asked to provide proof your dogs are currently inoculated when you
                    collect the dog.">{{ $application->jsonValue('care.inoculated') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="30. How many times a day would the dog be walked and how long would each walk last?">{{ $application->jsonValue('care.walk') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="31. Are there exercise areas nearby?">{{ $application->jsonValue('care.exercise_areas') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="32. Where will the dog be sleeping?">{{ $application->jsonValue('care.sleeping_area') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="33. Please give the name and telephone number of your vet or the vet you will be using in case of an emergency but only with MT's permission.">{{ $application->jsonValue('care.vetter') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="34. Please select your preferences for the type of dogs you would foster">{{ $application['fostering.preferences'] }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="35. If you have experience with or have a preference for a specific breed please list them below.">{{ $application->jsonValue('breed_preferences') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="36. Would you consider fostering an older dog who may take longer to home or one dog with a disability?">{{ $application->jsonValue('fostering.older') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="37. Are you happy for prospective adopters to come and meet the dog in your home?">{{ $application->jsonValue('fostering.prospective') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="38. Once you meet the prospective adopter are you comfortable to say you don't think they are right for the dog or the dog is not right to them? We would want you to call us first and discuss this before you told them.">{{ $application->jsonValue('fostering.bad_candidate') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="39. Do you have plans to move home within the next 3 months?">{{ $application->jsonValue('plans.move') }}</x-field-inline>
        <x-field-inline title-width="5"
                        label="40. Please add any other information you think may be helpful in your application here or type no other information.">{{ $application->jsonValue('additional_info') }}</x-field-inline>
    </div>
</div>
