<section class="section-md-register bg-white">
    <div class="shell">
        <div class="range range-sm-center spacing-30">
            <div class="cell-md-10 cell-lg-8 center">
                <h2 class="text-center">BECOME A VETTER FORM</h2>
                <div class="range range-sm-bottom spacing-20">
                    <x-field-section-header
                        label="1. How many miles are you willing to travel to do a Home vet?"
                        :field="['state.travel']">
                        <select wire:model.lazy="state.travel" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.vetter_form.options.travel') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>
                    <x-field-section-header
                        label="2. When are you available to carry out a home check?"
                        :field="['state.home_check']">
                        <select wire:model.lazy="state.home_check" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.vetter_form.options.home_check') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>
                    <x-field-section-header
                        label="3. Do you have your own transport?"
                        :field="['state.transport']">
                        <select wire:model.lazy="state.transport" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.vetter_form.options.transport') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>
                    <x-field-section-header
                        label="4. Do you currently or have you ever owned dogs?"
                        :field="['state.own_dog']">
                        <select wire:model.lazy="state.own_dog" class="form-control">
                            <option value="">Select</option>
                            @foreach(config('mtar.vetter_form.options.own_dog') as $key => $option)
                                <option value="{{ $key }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </x-field-section-header>

                    <x-field-section-header label="5. Other rescues you have home vetted for:" field="state.other_rescues">
                        <textarea wire:model.lazy="state.other_rescues" class="form-control"></textarea>
                    </x-field-section-header>

                    <x-field-section-header label="6. Name and date of the dog(s) you adopted from Many Tears:" field="state.dogs_adopted">
                        <textarea wire:model.lazy="state.dogs_adopted" class="form-control"></textarea>
                    </x-field-section-header>

                    <x-field-section-header label="7. Additional Information:" field="state.additional_info">
                        <textarea wire:model.lazy="state.additional_info" class="form-control"></textarea>
                    </x-field-section-header>

                    <x-field-section-header nolabel nomessage field="state.confirmations.*">
                        @foreach(config('mtar.vetter_form.options.confirmations') as $key => $value)
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
                </div>
                <div class="cell center mt-5">
                    @if($errors->any())
                        <div class="text-center alert alert-danger">Please correct the errors on the form to
                            proceed
                        </div>
                    @endif
                    <div class="form-group text-center mb-4">
                        <span></span>

                        <button wire:click="saveForm" class="btn btn-primary mx-2 mt-0">
                            Send vetter form
                        </button>
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
