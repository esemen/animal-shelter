<div>
    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="saveModal" tabindex="-1" role="dialog"
         aria-labelledby="saveModalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="saveModalLongTitle">Form Saved</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Your adoption form saved as draft.</p>
                    <p class="font-italic">Please note that files uploaded while saving as drafts will not be stored</p>
                </div>
                <div class="modal-footer">
                    <span></span>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-primary mr-4">Return to Profile</a>
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Continue Editing</button>
                </div>
            </div>
        </div>
    </div>

    <div class="shell">
        <h2 class="text-center">Adoption Form</h2>
        <h4 class="text-center m-2">for
            <a href="{{ route('pet.show', ['name'=>$application->animal->slug, 'animal'=>$application->animal]) }}"
               target="_blank">{{ $application->animal->name }} <i class="fa fa-paw"></i> </a>
        </h4>

        <div class="range range-sm-center spacing-30 mt-5">
            <div class="cell-sm-10 rd-mailform pt-5">
                <x-field-section-header nolabel field="state.confirmation.procedure">
                    <div class="form-check checkbox ml-4">
                        <input wire:model.defer="state.confirmation.procedure" class="form-check-input" type="checkbox"
                               value="1">
                        <p class="form-label-outside">Please confirm you have read our
                            <a class="d-inline" href="{{ url('/adopt-a-pet/dog#adoption-procedures') }}"
                               target="_blank"> Adoption Procedures.</a></p>
                    </div>
                </x-field-section-header>

                <x-field-section-header nolabel field="state.confirmation.travel">
                    <div class="form-check checkbox ml-4">
                        <input wire:model.defer="state.confirmation.travel" class="form-check-input" type="checkbox"
                               value="1">
                        <p class="form-label-outside">
                            Please confirm you understand that, depending on the animal you are adopting, you may be asked to bring all members of your household and possibly your other animals (depending on what they are) to collect the animal you are applying for wherever it is located.
                        </p>
                    </div>
                </x-field-section-header>

                <x-field-section-header label="1. Reason for selecting this animal" field="state.reason">
                    <textarea wire:model.defer="state.reason" class="form-control" id="adopt_reason"></textarea>
                </x-field-section-header>

                <x-field-section-header label="2. Please give the name, date and details of any animals you have already adopted from Many Tears or the name of any animal you have applied for in the past or type none in the box."
                                        field="state.applied_before">
                    <textarea wire:model.defer="state.applied_before" class="form-control"></textarea>
                </x-field-section-header>

                <x-field-section-header label="3. What type of property do you live in?"
                                        :field="['propertySelect','state.property.type']">
                    <select wire:model.lazy="propertySelect" class="form-control">
                        <option value="">Select</option>
                        @foreach(config('mtar.other_application_form.options.property.type') as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    <input wire:model.lazy="state.property.type"
                           class="form-control {{ $propertySelect === 'Other' ? null : 'hidden' }}" type="text"
                           id="property_type"
                           placeholder="Please say what kind of property you live in"/>
                </x-field-section-header>

                <x-field-section-header label="4. Do you own or rent your home?"
                                        :field="['state.property.ownership','rentalAgreement']">
                    <select wire:model.lazy="state.property.ownership" class="form-control">
                        <option value="">Select</option>
                        @foreach(config('mtar.other_application_form.options.property.ownership') as $key => $option)
                            <option value="{{ $key }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    <p class="p-3 {{ ($state['property']['ownership'] ?? '') === 'rent' ? null : 'hidden' }}"> Please
                        note we are unable to proceed with your application until you have provided proof of your rental
                        agreement showing how many animals you are permitted to have in the property or can provide
                        landlord???s permission for you to adopt a dog. Please attach this here to avoid any delay.
                        <input wire:model="rentalAgreement" name="rental_agreement" type="file" />
                    </p>
                </x-field-section-header>

                <x-field-section-header label="5. Do you have a back garden? ?"
                                        field="state.garden">
                    <select wire:model="state.garden" class="form-control">
                        <option value="">Select</option>
                        @foreach(config('mtar.other_application_form.options.garden') as $key => $option)
                            <option value="{{ $key }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </x-field-section-header>

                <x-field-section-header field="state.occupants.children.*" nomessage
                                        label="6. Please give the ages of any children (aged under 18) living in the property">
                    <small class="ml-3">Click the button to add up to 6 children</small>
                    <div class="input-box">
                        <button wire:click="addChild" class="add-btn"><i class="fa fa-plus"></i></button>
                    </div>
                    @foreach($state['occupants']['children'] ?? [] as $key => $item)
                        <div class="input-box cell-xs-6 cell-md-6">
                            <input wire:model="state.occupants.children.{{ $key }}" class="form-control" type="number"
                                   placeholder="Add child age ">
                            <div class="d-flex">
                                <button wire:click="removeChild({{ $key }})" class="mb-3 btn-danger float-right">Remove
                                </button>
                                @error('state.occupants.children.' . $key)
                                <span class="text-danger pl-4 pt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                </x-field-section-header>

                <x-field-section-header :field="['state.occupants.adults','state.occupants.adults.*']" nomessage
                                        label="7. Please give the ages of all the adults (aged 18 and over) who live at the property">
                    <small class="ml-3">Click the button to add up to 6 adults</small>
                    <div class="input-box">
                        <button wire:click="addAdult" class="add-btn"><i class="fa fa-plus"></i></button>
                    </div>
                    @foreach($state['occupants']['adults'] ?? [] as $key => $item)
                        <div class="input-box cell-xs-6 cell-md-6">
                            <input wire:model="state.occupants.adults.{{ $key }}" class="form-control" type="number"
                                   placeholder="Add adult age ">
                            <div class="d-flex">
                                <button wire:click="removeAdult({{ $key }})" class="mb-3 btn-danger float-right">Remove
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

                <x-field-section-header label="8. Please give the occupation and the working hours that
                            each adult in the home will be working for the next 3 weeks"
                                        field="state.occupation.working_hours">
                    <em class="mx-2">Please note we will not proceed with your application if clear working
                        hours/schedules are not given.</em>
                    <textarea wire:model="state.occupation.working_hours" class="form-control"></textarea>
                </x-field-section-header>

                <x-field-section-header field="state.experience.other_animals"
                                        label="9. What other animals currently live in your house. Please include breed, sex and age of animals?">
                    <textarea wire:model="state.experience.other_animals" class="form-control"></textarea>
                </x-field-section-header>

                <x-field-section-header :field="['state.care.neutered','state.care.not_neutered']"
                                        label="10. If you already own dogs/cats are they all spayed/neutered?">
                    <select wire:model="state.care.neutered" class="form-control">
                        <option value="">Select</option>
                        @foreach(config('mtar.other_application_form.options.care.neutered') as $key => $option)
                            <option value="{{ $key }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    <div class="pb-3 {{ ($state['care']['neutered'] ?? '') === 'no' ? null : 'hidden' }}">
                        <p class="px-2">If you've answered no to the above question, please give the reason why.</p>
                        <textarea wire:model="state.care.not_neutered" class="form-control"></textarea>
                    </div>
                </x-field-section-header>

                <x-field-section-header :field="['state.care.inoculated','state.care.not_inoculated']"
                                        label="11. Are all animals you own inoculated annually and will you continue to inoculate the cat
                    you want to adopt?">
                    <select wire:model="state.care.inoculated" class="form-control">
                        <option value="">Select</option>
                        @foreach(config('mtar.other_application_form.options.care.inoculated') as $key => $option)
                            <option value="{{ $key }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    <div class="pb-3 {{ ($state['care']['inoculated'] ?? '') === 'no' ? null : 'hidden' }}">
                        <p class="px-2">Please explain why you don???t inoculate your cats</p>
                        <textarea wire:model="state.care.not_inoculated" class="form-control"></textarea>
                    </div>
                </x-field-section-header>

                <x-field-section-header field="state.care.not_able_to_care"
                                        label="12. What would happen to the dog if you were no longer able to care for it?">
                    <textarea wire:model="state.care.not_able_to_care" class="form-control"></textarea>
                </x-field-section-header>

                <x-field-section-header field="state.care.vet_contact"
                                        label="13. Please give the name, address and telephone number of your vet or the vet you
                    will be taking the dog to and please be aware we may contact them for a reference.">
                    <textarea wire:model="state.care.vet_contact" class="form-control"></textarea>
                </x-field-section-header>

                <x-field-section-header label="14. Will you have insurance for your dog or pay as you go?"
                                        field="state.care.insurance">
                    <select wire:model="state.care.insurance" class="form-control">
                        <option value="">Select</option>
                        @foreach(config('mtar.other_application_form.options.care.insurance') as $key => $option)
                            <option value="{{ $key }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </x-field-section-header>

                <x-field-section-header
                    label="15. Please add any other information you think may be helpful in your application here">
                    <textarea wire:model="state.additional_info" class="form-control"></textarea>
                </x-field-section-header>

                <x-field-section-header label="16. Please confirm any holidays plans you have"
                                        field="state.plans.holiday">
                    @foreach (config('mtar.other_application_form.options.plans.holiday') as $key => $option)
                        <div class="form-check checkbox">
                            <input wire:model.defer="state.plans.holiday" class="form-check-input" type="radio"
                                   name="plans_holiday" value="{{ $key }}">
                            <label class="form-check-label">{{ $option }}</label>
                        </div>
                    @endforeach
                </x-field-section-header>

                <x-field-section-header label="17. Do you have plans to move home within the next 3 months?"
                                        field="state.plans.move">
                    @foreach (config('mtar.other_application_form.options.plans.move') as $key => $option)
                        <div class="form-check checkbox">
                            <input wire:model.defer="state.plans.move" class="form-check-input" type="radio"
                                   name="plans_move" value="{{ $key }}">
                            <label class="form-check-label">{{ $option }}</label>
                        </div>
                    @endforeach
                </x-field-section-header>

                <x-field-section-header field="state.plans.collect"
                                        label="18. Please confirm you will be able to collect the animal you've applied for within 3 days of passing your  home check.">
                    @foreach (config('mtar.other_application_form.options.plans.collect') as $key => $option)
                        <div class="form-check checkbox">
                            <input wire:model.defer="state.plans.collect" class="form-check-input" type="radio"
                                   name="plans_collect" value="{{ $key }}">
                            <label class="form-check-label">{{ $option }}</label>
                        </div>
                    @endforeach
                </x-field-section-header>

                <x-field-section-header :field="['foundSelect','state.found_through']"
                                        label="19. Please tell us how you found out about Many Tears. For
                            example, search engine, link from another site (please say which), recommended etc.">
                    <select wire:model="foundSelect" class="form-control">
                        <option value="">Select</option>
                        @foreach(config('mtar.other_application_form.options.found_through') as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    <div class="{{ $foundSelect === 'Other' ? null : 'hidden' }}">
                        <p>Where else did you hear about us?</p>
                        <textarea wire:model="state.found_through" class="form-control"></textarea>
                    </div>
                </x-field-section-header>
                <!-- Confirmations -->
                <x-field-section-header nolabel nomessage field="state.confirmations.*">
                    @foreach(config('mtar.other_application_form.options.confirmations') as $key => $value)
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
                        <div class="text-center alert alert-danger">Please correct the errors on the form to proceed
                        </div>
                    @endif
                    <div class="form-group text-center mb-4">
                        <span></span>
                        <button wire:click="saveDraft" class="btn btn-primary mx-2 mt-0">
                            Save as a draft
                        </button>

                        <button wire:click="saveApplication" class="btn btn-primary mx-2 mt-0">
                            Send adoption form
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        Livewire.on('draftSaved', () => {
            $('#saveModal').modal('show');
        })
    </script>
@endpush

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
