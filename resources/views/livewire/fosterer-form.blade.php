<section class="section-md-register bg-white">
    <div class="shell">
        <div class="range range-sm-center spacing-30">
            <div class="cell-md-10 cell-lg-8 center">
                <h2 class="text-center">BECOME A FOSTERER FORM</h2>
                <div class="range range-sm-bottom spacing-20">
                    <x-field-section-header label="1. Please give the name, date and details of any dogs you have already applied for or
          adopted from Many for in the past or type none in the box." field="state.experience.applied_before">
                        <textarea wire:model.lazy="state.experience.applied_before" class="form-control"></textarea>
                    </x-field-section-header>

                    <x-field-section-header
                        label="2. Have you fostered before? If so please list the names of the rescues you have
            fostered for including Many Tears if we are one of them."
                        :field="['state.experience.fostered_before','state.experience.fostered_before_info']">
                        <select wire:model.lazy="state.experience.fostered_before" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.experience.fostered_before') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        <input wire:model="state.experience.fostered_before_info"
                               class="form-control {{ ($state['experience']['fostered_before'] ?? '') == 'yes' ? null : 'hidden' }}"
                               type="text"
                               id="fostered_before"
                               placeholder="Please list the names of the rescues for which you have fostered"/>
                    </x-field-section-header>

                    <x-field-section-header
                        label="3. Are you planning to start fostering immediately or in the future?"
                        :field="['state.fostering.start']">
                        <select wire:model.lazy="state.fostering.start" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.fostering.start') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header
                        label="4. Are you happy to continuing fostering if you adopt the first dog you foster?"
                        :field="['state.fostering.continue']">
                        <select wire:model.lazy="state.fostering.continue" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.fostering.continue') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header
                        label="5. Do you have your own transport?"
                        :field="['state.fostering.transport']">
                        <select wire:model.lazy="state.fostering.transport" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.fostering.transport') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header
                        label="6. Where are you able to collect you foster dog from?"
                        :field="['state.fostering.collection']">
                        <div class="cell-sm-6">
                            @foreach (config('mtar.fosterer_form.options.fostering.collection') as $key => $option)
                                <div class="form-check checkbox">
                                    <input wire:model="state.fostering.collection"
                                           class="form-check-input"
                                           type="checkbox" value="{{ $key }}">
                                    <label class="form-check-label">{{ $option }}</label>
                                </div>
                            @endforeach
                        </div>
                    </x-field-section-header>

                    <x-field-section-header label="7. If you are unable to collect from any of the above please,
    we also occasionally have foster runs going north and up to Scotland.
    Please give details of the service station closest to Many Tears you are able to travel to."
                                            field="state.fostering.closest">
                        <input type="text" wire:model.defer="state.fostering.closest" class="form-control">
                    </x-field-section-header>

                    <x-field-section-header label="8. What type of property do you live in?"
                                            :field="['propertySelect','state.property.type']">
                        <select wire:model.lazy="propertySelect" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.property.type') as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        <input wire:model.lazy="state.property.type"
                               class="form-control {{ $propertySelect === 'Other' ? null : 'hidden' }}"
                               type="text"
                               id="property_type"
                               placeholder="Please say what kind of property you live in"/>
                    </x-field-section-header>

                    <x-field-section-header label="9. Do you own or rent your home?"
                                            :field="['state.property.ownership','rentalAgreement']">
                        <select wire:model.lazy="state.property.ownership" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.property.ownership') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        <p class="p-3 {{ ($state['property']['ownership'] ?? '') === 'rent' ? null : 'hidden' }}">
                            Please
                            note we are unable to proceed with your application until you have provided proof of
                            your rental
                            agreement showing how many animals you are permitted to have in the property or can
                            provide
                            landlord’s permission for you to adopt a dog. Please attach this here to avoid any
                            delay.
                            <input wire:model="rentalAgreement" type="file"/>
                        </p>
                    </x-field-section-header>

                    <x-field-section-header label="10. What size is your garden? Please note your garden MUST
                            be secure or you must have a secure
                            area for the dog to go out in." field="state.garden.size">
                        <select wire:model="state.garden.size" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.garden.size') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header label="11. Is your back garden separate from your front garden?"
                                            field="state.garden.separate">
                        <select wire:model="state.garden.separate" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.garden.separate') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header field="state.garden.communal"
                                            label="12. Do you have a communal garden or does anyone have access to the garden other than you and your family?">
                        <select wire:model="state.garden.communal" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.garden.communal') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header label="13. What is the height of your fencing at its lowest point?"
                                            field="state.garden.fence">
                        <select wire:model="state.garden.fence" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.garden.fence') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header
                        label="14. Do you have any pools or ponds and if so are they covered/enclosed?"
                        field="state.garden.pool">
                        <select wire:model="state.garden.pool" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.garden.pool') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header label="15. Do you have a dog kennel/run in your garden?"
                                            field="state.garden.kennel">
                        <select wire:model="state.garden.kennel" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.garden.kennel') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header field="state.occupants.children.*" nomessage
                                            label="16. Please give the ages of any children (aged under 18) living in the property">
                        <small class="ml-3">Click the button to add up to 6 children</small>
                        <div class="input-box">
                            <button wire:click="addChild" class="add-btn"><i class="fa fa-plus"></i></button>
                        </div>
                        @foreach($state['occupants']['children'] ?? [] as $key => $item)
                            <div class="input-box cell-xs-6 cell-md-6">
                                <input wire:model="state.['occupants']['children'].{{ $key }}" class="form-control"
                                       type="number"
                                       placeholder="Add child age ">
                                <div class="d-flex">
                                    <button wire:click="removeChild({{ $key }})"
                                            class="mb-3 btn-danger float-right">Remove
                                    </button>
                                    @error('state.occupants.children.' . $key)
                                    <span class="text-danger pl-4 pt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </x-field-section-header>

                    <x-field-section-header
                        label="17.	Do you have people visiting with children visiting regularly?"
                        field="state.occupants.visitor">
                        <select wire:model="state.occupants.visitor" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.occupants.visitor') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header :field="['state.occupants.adults','state.occupants.adults.*']"
                                            nomessage
                                            label="18. Please give the ages of all the adults (aged 18 and over) who live at the property">
                        <small class="ml-3">Click the button to add up to 6 adults</small>
                        <div class="input-box">
                            <button wire:click="addAdult" class="add-btn"><i class="fa fa-plus"></i></button>
                        </div>
                        @foreach($state['occupants']['adults'] ?? [] as $key => $item)
                            <div class="input-box cell-xs-6 cell-md-6">
                                <input wire:model="state.occupants.adults.{{ $key }}" class="form-control"
                                       type="number"
                                       placeholder="Add adult age ">
                                <div class="d-flex">
                                    <button wire:click="removeAdult({{ $key }})"
                                            class="mb-3 btn-danger float-right">Remove
                                    </button>
                                    @error('state.occupants.adults.' . $key)
                                    <span class="text-danger pl-4 pt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                        @error('state.occupants.adults')
                        <div class="text-danger pl-2">{{ $message }}</div>
                        @enderror
                    </x-field-section-header>

                    <x-field-section-header label="19. Please give the occupation and the working hours that
                            each adult in the home will be working for the next 3 weeks"
                                            field="state.occupation.working_hours">
                        <em class="mx-2">Please note we will not proceed with your application if clear working
                            hours/schedules are not given.</em>
                        <textarea wire:model="state.occupation.working_hours" class="form-control"></textarea>
                    </x-field-section-header>

                    <x-field-section-header label="20. Do you work from home?"
                                            :field="['state.occupation.wfh','employerVerification']">
                        <select wire:model="state.occupation.wfh" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.occupation.wfh') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        <p class="p-3 {{ ($state['occupation']['wfh'] ?? '') === 'yes' ? null : 'hidden' }}">
                            Please attach confirmation from your employer verifying this.
                            <input wire:model="employerVerification" type="file"/>
                        </p>
                    </x-field-section-header>

                    <x-field-section-header
                        label="21. If you work from home where is the dog kept when you are working?"
                        field="state.occupation.wfh_kept">
                        <select wire:model="state.occupation.wfh_kept" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.occupation.wfh_kept') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header field="state.occupation.hours_left"
                                            label="22. What is the longest time in TOTAL in any one day (i.e. within a 24 hr period) that a dog would be left?">
                        <select wire:model="state.occupation.hours_left" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.occupation.hours_left') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header field="state.occupation.days_left"
                                            label="23. How many times a week would a dog be left for the time selected above?">
                        <select wire:model="state.occupation.days_left" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.occupation.days_left') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header label="24. What dogs have you owned in the past?"
                                            field="state.experience.past_animals">
                        <textarea wire:model="state.experience.past_animals" class="form-control"></textarea>
                    </x-field-section-header>

                    <x-field-section-header field="state.experience.other_animals"
                                            label="25. What other animals currently live in your house. Please include breed, sex and age of animals?">
                        <textarea wire:model="state.experience.other_animals" class="form-control"></textarea>
                    </x-field-section-header>

                    <x-field-section-header
                        :field="['state.experience.resident_dogs']"
                        label="26. Does the resident dog(s) regularly socialise with other dogs? For example, in the park or when out on walks.">
                        <select wire:model="state.experience.resident_dogs" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.experience.resident_dogs') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header
                        :field="['state.experience.reactive_dogs','state.experience.dog_issues']"
                        label="27. Are any of the dogs currently living in your home reactive with other dogs or have any known behavioural issues?">
                        <select wire:model="state.experience.reactive_dogs" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.experience.reactive_dogs') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        <div
                            class="pb-3 {{ ($state['experience']['reactive_dogs'] ?? '') === 'yes' ? null : 'hidden' }}">
                            <p class="px-2">Please give details of why you have answered yes and how you manage
                                any
                                issues.</p>
                            <textarea wire:model="state.experience.dog_issues" class="form-control"></textarea>
                        </div>
                    </x-field-section-header>

                    <x-field-section-header :field="['state.care.neutered','state.care.not_neutered']"
                                            label="28. If you already own dogs/cats are they all spayed/neutered?">
                        <select wire:model="state.care.neutered" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.care.neutered') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        <div class="pb-3 {{ ($state['care']['neutered'] ?? '') === 'no' ? null : 'hidden' }}">
                            <p class="px-2">If you've answered no to the above question, please give the reason
                                why.</p>
                            <textarea wire:model="state.care.not_neutered" class="form-control"></textarea>
                        </div>
                    </x-field-section-header>

                    <x-field-section-header :field="['state.care.inoculated','state.care.not_inoculated']"
                                            label="29. Are all animals you own inoculated annually and will you continue to inoculate the dog
                    you want to adopt? You will be asked to provide proof your dogs are currently inoculated when you
                    collect the dog.">
                        <select wire:model="state.care.inoculated" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.care.inoculated') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        <div class="pb-3 {{ ($state['care']['inoculated'] ?? '') === 'no' ? null : 'hidden' }}">
                            <p class="px-2">Please explain why you don’t inoculate your dogs</p>
                            <textarea wire:model="state.care.not_inoculated" class="form-control"></textarea>
                        </div>
                    </x-field-section-header>

                    <x-field-section-header field="state.care.walk"
                                            label="30. How many times a day would the dog be walked and how long would each walk last?">
                        <textarea wire:model="state.care.walk" class="form-control"></textarea>
                    </x-field-section-header>

                    <x-field-section-header label="31. Are there exercise areas nearby?"
                                            :field="['exerciseSelect','state.care.exercise_areas']">
                        <select wire:model="exerciseSelect" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.care.exercise_areas') as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                        <input wire:model="state.care.exercise_areas"
                               class="form-control {{ $exerciseSelect === 'Other' ? null : 'hidden' }}"
                               type="text"
                               placeholder="Please explain where your dog will be walked"/>
                    </x-field-section-header>

                    <x-field-section-header label="32. Where will the dog be sleeping?"
                                            field="state.care.sleeping_area">
                        <textarea wire:model="state.care.sleeping_area" class="form-control"></textarea>
                    </x-field-section-header>

                    <x-field-section-header field="state.care.vetter"
                                            label="33. Please give the name and telephone number of your vet or the vet you will be using in case of an emergency but only with MT's permission.">
                        <textarea wire:model="state.care.vetter" class="form-control"></textarea>
                    </x-field-section-header>

                    <x-field-section-header
                        label="34. Please select your preferences for the type of dogs you would foster"
                        :field="['state.fostering.preferences']">
                        <div class="cell-sm-6">
                            @foreach (config('mtar.fosterer_form.options.fostering.preferences') as $key => $option)
                                <div class="form-check checkbox">
                                    <input wire:model="state.fostering.preferences"
                                           class="form-check-input" value="{{ $key }}"
                                           type="checkbox">
                                    <label class="form-check-label">{{ $option }}</label>
                                </div>
                            @endforeach
                        </div>
                    </x-field-section-header>

                    <x-field-section-header field="state.fostering.breed_preferences"
                                            label="35. If you have experience with or have a preference for a specific breed please list them below.">
                            <textarea wire:model.lazy="state.fostering.breed_preferences"
                                      class="form-control"></textarea>
                    </x-field-section-header>

                    <x-field-section-header
                        label="36. Would you consider fostering an older dog who may take longer to home or one dog with a disability?"
                        :field="['state.fostering.older']">
                        <select wire:model.lazy="state.fostering.older" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.fostering.older') as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header
                        label="37. Are you happy for prospective adopters to come and meet the dog in your home?"
                        :field="['state.fostering.prospective']">
                        <select wire:model="state.fostering.prospective" class="form-control">
                            <option value="'state.fostering.prospective'">Select</option>
                            @foreach(config('mtar.fosterer_form.options.fostering.prospective') as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header
                        label="38. Once you meet the prospective adopter are you comfortable to say you don't think they are right for the dog or the dog is not right to them? We would want you to call us first and discuss this before you told them."
                        :field="['state.fostering.bad_candidate']">
                        <select wire:model="state.fostering.bad_candidate" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.fosterer_form.options.fostering.bad_candidate') as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header label="39. Do you have plans to move home within the next 3 months?"
                                            field="state.plans.move">
                        @foreach (config('mtar.fosterer_form.options.plans.move') as $key => $option)
                            <div class="form-check checkbox">
                                <input wire:model.defer="state.plans.move" class="form-check-input" type="radio"
                                       name="plans_move" value="{{ $key }}">
                                <label class="form-check-label">{{ $option }}</label>
                            </div>
                        @endforeach
                    </x-field-section-header>

                    <x-field-section-header field="state.additional_info"
                                            label="40. Please add any other information you think may be helpful in your application here or type no other information.  ">
                        <textarea wire:model="state.additional_info" class="form-control"></textarea>
                    </x-field-section-header>

                    <x-field-section-header nolabel nomessage field="state.confirmations.*">
                        @foreach(config('mtar.fosterer_form.options.confirmations') as $key => $value)
                            <div class="form-checkbox-custom">
                                <div class="form-check checkbox">
                                    <input wire:model="state.confirmations.{{ $key }}" class="form-check-input"
                                           type="checkbox" value="1" id="state.confirmations.{{ $key }}">
                                    <label class="form-check-label"
                                           for="state.confirmations.{{ $key }}">{{ $value }}</label>
                                    @error('state.confirmations.' . $key)
                                    <span class="text-danger pl-4">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </x-field-section-header>

                    <div class="cell center mt-5">
                        @if($errors->any())
                            <div class="text-center alert alert-danger">Please correct the errors on the form to
                                proceed
                            </div>
                        @endif
                        <div class="form-group text-center mb-4">
                            <span></span>

                            <button wire:click="saveForm" class="btn btn-primary mx-2 mt-0">
                                Send fosterer form
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@push('styles')
    <style type="text/css">
        .form-control:focus {
            border-color: #0faef0 !important;
            border-width: 1px;
            border-style: solid;
        }

        .is-invalid .form-group {
            border-top-color: #ff6666;
            border-top-style: solid;
            border-top-width: 5px;
        }
    </style>
@endpush
