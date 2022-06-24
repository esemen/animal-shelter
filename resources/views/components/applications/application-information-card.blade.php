@props([
    'application' => null
])

<div {{ $attributes->exceptProps(['application'])->merge(['class' => 'card']) }}>
    <div class="card-body row">
        <div class="col">
            <div class="ff-title">1. Reason for selecting this animal</div>
            <div class="ff-value">
                {{ $application->reason }}
            </div>
            <div class="ff-title">2. Applied to adopt before</div>
            <div class="ff-value">
                {{ $application->jsonValue('applied_before') }}
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="ff-title">3. Property type</div>
                    <div class="ff-value">
                        {{ $application->jsonValue('property.type') }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ff-title">4. Property ownership</div>
                    <div class="ff-value">
                        @if($application->jsonKey('property.ownership') === 'rent' && $application->jsonValue('uploads.rental_agreement.filename'))
                            <span class="float-right text-nowrap">
                                <a href="{{ route('applications.download', ['application' => $application, 'type' => 'rental-agreement']) }}">
                                    <i class="fa fa-download"></i> Rental Agreement
                                </a>
                            </span>
                        @endif

                        {{ $application->jsonValue('property.ownership') }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="ff-title">5. Garden size</div>
                    <div class="ff-value">
                        {{ $application->jsonValue('garden.size') }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ff-title">6. Separate garden</div>
                    <div class="ff-value">
                        {{ $application->jsonValue('garden.separate') }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ff-title">7. Communal garden</div>
                    <div class="ff-value">
                        {{ $application->jsonValue('garden.communal') }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ff-title">8. Garden fence height</div>
                    <div class="ff-value">
                        {{ $application->jsonValue('garden.fence') }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ff-title">9. Pools / Ponds</div>
                    <div class="ff-value">
                        {{ $application->jsonValue('garden.pool') }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ff-title">10. Dog Kennel / Run</div>
                    <div class="ff-value">
                        {{ $application->jsonValue('garden.kennel') }}
                    </div>
                </div>
                @if(isset($application->occupants['children']))
                <div class="col-lg-6">
                    <div class="ff-title">11. Children</div>
                    <div class="ff-value">
                        @if(count($application->occupants['children'] ?? []))
                            {{ count($application->occupants['children']) }}
                            {{ Str::plural('child', count($application->occupants['children'])) }}
                            ({{ collect($application->occupants['children'])->sort()->join(', ') }} years)
                        @else
                            -
                        @endif
                    </div>
                </div>
                @endif
                @if(isset($application->occupants['adults']))
                <div class="col-lg-6">
                    <div class="ff-title">12. Adults</div>
                    <div class="ff-value">

                            {{ count($application->occupants['adults']) }}
                            {{ Str::plural('adult', count($application->occupants['adults'])) }}
                            ({{ collect($application->occupants['adults'])->sort()->join(', ') }} years)

                    </div>
                </div>
                @endif
            </div>

            <div class="ff-title">13. Occupation and working hours</div>
            <div class="ff-value">
                {{ $application->jsonValue('occupation.working_hours') }}
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="ff-title">14. Work from home</div>
                    <div class="ff-value">
                        @if($application->jsonKey('occupation.wfh') === 'yes' && $application->jsonValue('uploads.employer_verification.filename'))
                            <span class="float-right text-nowrap">
                                <a href="{{ route('applications.download', ['application' => $application, 'type' => 'employer-verification']) }}">
                                    <i class="fa fa-download"></i> Employer Verification
                                </a>
                            </span>
                        @endif

                        {{ $application->jsonValue('occupation.wfh') }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ff-title">15. Where the animal be kept while working</div>
                    <div class="ff-value">
                        {{ $application->jsonValue('occupation.wfh_kept') }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ff-title">16. The longest time in a day the animal would be left</div>
                    <div class="ff-value">
                        {{ $application->jsonValue('occupation.hours_left') }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ff-title">17. Times in a week the animal would be left</div>
                    <div class="ff-value">
                        {{ $application->jsonValue('occupation.days_left') }}
                    </div>
                </div>
            </div>

            <div class="ff-title">18. The dogs have owned in the past</div>
            <div class="ff-value">
                {{ $application->jsonValue('experience.past_animals') }}
            </div>
            <div class="ff-title">19. Other animals currently live in the house</div>
            <div class="ff-value">
                {{ $application->jsonValue('experience.other_animals') }}
            </div>
            <div class="ff-title">20. Any dogs currently living in the home reactive with other dogs</div>
            <div class="ff-value">
                {{ $application->jsonValue('experience.reactive_dogs') }}

                @if($application->jsonKey('experience.reactive_dogs') === 'yes')
                    <hr class="my-2"/>
                    <span class="d-block text-bold">How to manage?</span>
                    {{ $application->jsonValue('experience.dog_issues') }}
                @endif
            </div>
            <div class="ff-title">21. Already own dogs/cats are they all spayed/neutered?</div>
            <div class="ff-value">
                {{ $application->jsonValue('care.neutered') }}

                @if($application->jsonKey('care.neutered') === 'no')
                    <hr class="my-2"/>
                    <span class="d-block text-bold">Why not?</span>
                    {{ $application->jsonValue('care.not_neutered') }}
                @endif
            </div>

            <div class="ff-title">22. Inoculated animals annually?</div>
            <div class="ff-value">
                {{ $application->jsonValue('care.inoculated') }}

                @if($application->jsonKey('care.inoculated') === 'no')
                    <hr class="my-2"/>
                    <span class="d-block text-bold">Why not?</span>
                    {{ $application->jsonValue('care.not_inoculated') }}
                @endif
            </div>
            <div class="ff-title">23. How many times a day would the dog be walked and how long would each walk
                last?
            </div>
            <div class="ff-value">
                {{ $application->jsonValue('care.walk') }}
            </div>

            <div class="ff-title">24. Exercise areas nearby</div>
            <div class="ff-value">
                {{ $application->jsonValue('care.exercise_areas') }}
            </div>

            <div class="ff-title">25. Where will the dog be sleeping?</div>
            <div class="ff-value">
                {{ $application->jsonValue('care.sleeping_area') }}
            </div>

            <div class="ff-title">26. What would happen to the dog if they were no longer able to care for it?</div>
            <div class="ff-value">
                {{ $application->jsonValue('care.not_able_to_care') }}
            </div>

            <div class="ff-title">27. If adopting a puppy do they agree to have it spayed/neutered by the time it is
                six months old?
            </div>
            <div class="ff-value">
                {{ $application->jsonValue('care.puppy_neuter') }}

                @if($application->jsonKey('care.puppy_neuter') === 'no')
                    <hr class="my-2"/>
                    <span class="d-block text-bold">Why not?</span>
                    {{ $application->jsonValue('care.puppy_not_neuter') }}
                @endif
            </div>

            <div class="ff-title">28. Puppy training intentions</div>
            <div class="ff-value">
                {{ $application->jsonValue('care.puppy_training') }}
            </div>

            <div class="ff-title">29. Vet contact</div>
            <div class="ff-value">
                {{ $application->jsonValue('care.vet_contact') }}
            </div>

            <div class="ff-title">30. Insurance</div>
            <div class="ff-value">
                {{ $application->jsonValue('care.insurance') }}
            </div>

            <div class="ff-title">31. Additional information</div>
            <div class="ff-value">
                {{ $application->additional_info }}
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="ff-title">32. Holiday plans</div>
                    <div class="ff-value">
                        {{ $application->jsonValue('plans.holiday') }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ff-title">33. Plan to move</div>
                    <div class="ff-value">
                        {{ $application->jsonValue('plans.move') }}
                    </div>
                </div>
            </div>

            <div class="ff-title">34. Confirmation to collect the dog for within 3 days of passing home check</div>
            <div class="ff-value">
                {{ $application->jsonValue('plans.collect') }}
            </div>

            <div class="ff-title">35. Where they found Many Tears?</div>
            <div class="ff-value">
                {{ $application->jsonValue('found_through') }}
            </div>
        </div>
    </div>
    <div class="text-center mt-5">
        <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-undo"></i> Return to Home</a>
        <form method="post" action="{{ route('applications.approve', ['application' => $application]) }}" class="d-inline">
            @csrf
            @method('put')
            <button class="btn btn-success"><i class="fa fa-check"></i> Approve</button>
        </form>
        <form method="post" action="{{ route('applications.reject', ['application' => $application]) }}" class="d-inline">
            @csrf
            @method('delete')
            <button class="btn btn-danger"><i class="fa fa-close"></i> Reject</button>
        </form>
    </div>
</div>
