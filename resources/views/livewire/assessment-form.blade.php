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
                    <p>Your assessment form saved as draft.</p>
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
        <h2 class="text-center">Assessment Form</h2>
        <h4 class="text-center m-2">for {{$animal->name}}
        </h4>

        <div class="range range-sm-center spacing-30 mt-5">
            <div class="cell-sm-10 rd-mailform pt-5">


                <x-field-section-header label="DOG'S REACTION WHEN MEETING OTHER DOGS"
                                        field="state.dog.dog_reaction">
                    @foreach (config('mtar.assessment_form.options.dog.dog_reaction') as $key)
                        <div class="form-check checkbox">
                            <input wire:model.defer="state.dog.dog_reaction" class="form-check-input" type="radio"
                                   name="dog_reaction" value="{{ $key }}">
                            <label class="form-check-label">{{ $key }}</label>
                        </div>
                    @endforeach
                </x-field-section-header>

                <x-field-section-header label="DOG'S REACTION WHEN MEETING NEW PEOPLE"
                                        field="state.dog.meeting_people">
                    @foreach (config('mtar.assessment_form.options.dog.meeting_people') as $key)
                        <div class="form-check checkbox">
                            <input wire:model.defer="state.dog.meeting_people" class="form-check-input" type="radio"
                                   name="meeting_people" value="{{ $key }}">
                            <label class="form-check-label">{{ $key }}</label>
                        </div>
                    @endforeach
                </x-field-section-header>

                <x-field-section-header label="DOG'S REACTION WHEN MEETING CHILDREN"
                                        field="state.dog.meeting_children">
                    @foreach (config('mtar.assessment_form.options.dog.meeting_children') as $key)
                        <div class="form-check checkbox">
                            <input wire:model.defer="state.dog.meeting_children" class="form-check-input" type="radio"
                                   name="meeting_children" value="{{ $key }}">
                            <label class="form-check-label">{{ $key }}</label>
                        </div>
                    @endforeach
                </x-field-section-header>

                <x-field-section-header label="DOG'S REACTION TO CATS"
                                        field="state.dog.meeting_cats">
                    @foreach (config('mtar.assessment_form.options.dog.meeting_cats') as $key)
                        <div class="form-check checkbox">
                            <input wire:model.defer="state.dog.meeting_cats" class="form-check-input" type="radio"
                                   name="meeting_cats" value="{{ $key }}">
                            <label class="form-check-label">{{ $key }}</label>
                        </div>
                    @endforeach
                </x-field-section-header>

                <x-field-section-header label="DOG'S REACTION TO TRAFFIC"
                                        field="state.dog.traffic">
                    @foreach (config('mtar.assessment_form.options.dog.traffic') as $key)
                        <div class="form-check checkbox">
                            <input wire:model.defer="state.dog.traffic" class="form-check-input" type="radio"
                                   name="traffic" value="{{ $key }}">
                            <label class="form-check-label">{{ $key }}</label>
                        </div>
                    @endforeach
                </x-field-section-header>

                <x-field-section-header label="DOG'S MANNER ON A LEAD"
                                        field="state.dog.on_lead">
                    @foreach (config('mtar.assessment_form.options.dog.on_lead') as $key)
                        <div class="form-check checkbox">
                            <input wire:model.defer="state.dog.on_lead" class="form-check-input" type="radio"
                                   name="on_lead" value="{{ $key }}">
                            <label class="form-check-label">{{ $key }}</label>
                        </div>
                    @endforeach
                </x-field-section-header>

                <x-field-section-header label="HOUSE TRAINING"
                                        field="state.dog.house_training">
                    @foreach (config('mtar.assessment_form.options.dog.house_training') as $key)
                        <div class="form-check checkbox">
                            <input wire:model.defer="state.dog.house_training" class="form-check-input" type="radio"
                                   name="house_training" value="{{ $key }}">
                            <label class="form-check-label">{{ $key }}</label>
                        </div>
                    @endforeach
                </x-field-section-header>

                <x-field-section-header label="CRATE TRAINING"
                                        field="state.dog.crate_training">
                    @foreach (config('mtar.assessment_form.options.dog.crate_training') as $key)
                        <div class="form-check checkbox">
                            <input wire:model.defer="state.dog.crate_training" class="form-check-input" type="radio"
                                   name="crate_training" value="{{ $key }}">
                            <label class="form-check-label">{{ $key }}</label>
                        </div>
                    @endforeach
                </x-field-section-header>

                <x-field-section-header label="TRAVEL"
                                        field="state.dog.travel">
                    @foreach (config('mtar.assessment_form.options.dog.travel') as $key)
                        <div class="form-check checkbox">
                            <input wire:model.defer="state.dog.travel" class="form-check-input" type="radio"
                                   name="travel" value="{{ $key }}">
                            <label class="form-check-label">{{ $key }}</label>
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
