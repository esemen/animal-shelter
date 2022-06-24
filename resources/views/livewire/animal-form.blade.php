<div>
    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="locationModal" tabindex="-1" role="dialog"
         aria-labelledby="locationModalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="locationModalLongTitle">Set Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="locationSearchTerm">Search</label>
                        <input wire:model.debounce.700ms="locationSearchTerm" class="form-control"
                               type="text" id="locationSearchTerm" placeholder="Search for a name">
                        <small class="form-text text-muted">You must enter at least 3 letters to search</small>
                    </div>
                    <div class="list-group" style="max-height: 400px; margin-bottom: 10px; overflow-y: auto;
    -webkit-overflow-scrolling: touch;">
                        @forelse ($this->searchLocation as $user)
                            <button wire:click="setLocation('{{ $user->uuid }}')" data-dismiss="modal"
                                    class="list-group-item">
                                <h5>{{ $user->fullName }}</h5>
                                <p>{{ $user->fullAddress }}</p>
                            </button>
                        @empty
                            <div class="list-group-item list-group-item-light">No records found</div>
                        @endforelse
                    </div>
                </div>
                <div class="modal-footer">
                    <span></span>
                    @if(isset($location))
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"
                                wire:click="clearLocation">Delete
                        </button>
                    @endif
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="shell">
        <div class="range range-sm-center spacing-30">
            @if ($errors->any())
                <div class="alert alert-danger col-xs-12">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ str_replace('id ', '', str_replace('state.', '', $error)) }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                @if ($this->isNew)
                    <x-field-section class="col-md-6" label="Animal Type">
                        <select wire:model.lazy="state.animal_type_id" class="form-control">
                            <option>Select</option>
                            @foreach($animalTypes as $animalType)
                                <option value="{{ $animalType->id }}">{{ ucfirst($animalType->type) }}</option>
                            @endforeach
                        </select>
                    </x-field-section>

                    <x-field-section class="col-md-6" label="Gender">
                        <select wire:model.lazy="state.sex" class="form-control" name="sex" id="sex">
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </x-field-section>

                    <x-field-section class="col-md-6" label="Name">
                        <input wire:model.lazy="state.name" class="form-control" type="text" id="name">
                    </x-field-section>

                    <x-field-section class="col-md-6" label="Arrival Date">
                        <input wire:model.lazy="state.incoming" class="form-control" type="date" id="incoming">
                    </x-field-section>
                @else
                <!-- This is animal update form -->
                    <x-field-section class="col-xs-3" label="Animal Type">
                        <input class="form-control" type="text" value="{{ $animal->type->name }}" readonly disabled>
                    </x-field-section>

                    <x-field-section class="col-xs-3" label="Gender">
                        <select wire:model.lazy="state.sex" class="form-control" name="sex" id="sex">
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </x-field-section>

                    <x-field-section class="col-xs-6" label="Breed">
                        <div wire:ignore>
                            <select wire:model="state.breed" class="form-control" id="breed">
                                <option value="">Select</option>
                                @foreach($breeds as $breed)
                                    <option value="{{ $breed }}">{{ $breed }}</option>
                                @endforeach
                            </select>
                        </div>
                    </x-field-section>

                    <x-field-section class="col-xs-3" label="Name">
                        <input wire:model.lazy="state.name" class="form-control" type="text" id="name">
                    </x-field-section>

                    <x-field-section class="col-xs-3" label="Status">
                        <select wire:model.lazy="state.animal_status_id" class="form-control">
                            <option>Select</option>
                            @foreach($animalStatuses as $animalStatus)
                                <option value="{{ $animalStatus->id }}">{{ $animalStatus->name }}</option>
                            @endforeach
                        </select>
                    </x-field-section>

                    <x-field-section class="col-xs-3" label="Arrival Date">
                        <input wire:model.lazy="state.incoming" class="form-control" type="date" id="incoming">
                    </x-field-section>

                    <x-field-section class="col-xs-3" label="Passport No">
                        <input wire:model.lazy="state.passport" class="form-control" type="text" id="passport">
                    </x-field-section>

                    <x-field-section class="col-xs-2" label="Microchip 1">
                        <input wire:model.lazy="state.microchip1" class="form-control" type="text"
                               id="microchip1" size="15" pattern="^(0|[1-9][0-9]*)$">
                    </x-field-section>

                    <x-field-section class="col-xs-2" label="Microchip 2">
                        <input wire:model.lazy="state.microchip2" class="form-control" type="text"
                               id="microchip2" size="15" pattern="^(0|[1-9][0-9]*)$">
                    </x-field-section>

                    <x-field-section class="col-xs-2" label="Update Chip">
                        <div class="form-check">
                            <input wire:model.lazy="state.update_chip" class="form-check-input"
                                   type="checkbox" id="update_chip">
                        </div>
                    </x-field-section>

                    <x-field-section class="col-xs-3" label="Chip Company">
                        <input wire:model.lazy="state.chip_company" class="form-control" type="text"
                               id="chipCompany">
                    </x-field-section>

                    <x-field-section class="col-xs-3" label="Chip Status">
                        <input class="form-control" type="text" id="question">
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="DOB">
                        <input wire:model.lazy="state.dob" class="form-control" type="date" name="dob" id="dob">
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="Age">
                        <input class="form-control" type="text" id="age"
                               value="{{ $this->age }}" readonly>
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="Colour">
                        <input class="form-control" type="text" id="colour" wire:model.lazy="state.colour">
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="First Jab">
                        <input wire:model.lazy="state.first_jab" class="form-control" type="date" id="first_jab">
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="Second Jab">
                        <input wire:model.lazy="state.second_jab" class="form-control" type="date" id="second_jab">
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="Third Jab/Booster">
                        <input wire:model.lazy="state.booster_due" class="form-control" type="date" id="booster_due">
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="First Rabies">
                        <input wire:model.lazy="state.first_rabies" class="form-control" type="date"
                               id="first_rabies">
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="Second Rabies">
                        <input wire:model.lazy="state.second_rabies" class="form-control" type="date"
                               id="second_rabies">
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="Kennel Cough">
                        <input wire:model.lazy="state.kennel_cough" class="form-control" type="date"
                               id="kennel_cough">
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="Weight (KG)">
                        <input wire:model.lazy="state.weight" class="form-control" type="text" id="size">
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="Fleaed">
                        <input wire:model.lazy="state.fleaed" class="form-control" type="date" id="fleaed">
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="Wormed">
                        <input wire:model.lazy="state.wormed" class="form-control" type="date" id="wormed">
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="Neuter Due">
                        <input wire:model.lazy="state.neuter_due" class="form-control" type="date" id="neuter_due">
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="Neutered">
                        <input wire:model.lazy="state.neutered" class="form-control" type="date" id="neutered">
                    </x-field-section>

                    <x-field-section class="col-xs-4" label="Stitches Out">
                        <input wire:model="state.stitches_out" class="form-control" type="date" id="stitches_out">
                    </x-field-section>

                    <!-- Attribute Checkboxes -->
                    @if($animal->type->name === 'Dog')
                        @foreach($animalAttributesDogs as $key => $label)
                            <x-field-section-checkbox class="col-xs-2 mt-4" :label="$label['label']" :checkbox="$key">
                                <input type="checkbox" class="form-check-input" id="{{ $key }}"
                                       wire:model.lazy="state.attributes.{{ $key }}">
                            </x-field-section-checkbox>
                        @endforeach
                    @elseif($animal->type->name === 'Cat')
                            @foreach($animalAttributesCats as $key => $label)
                                <x-field-section-checkbox class="col-xs-2 mt-4" :label="$label['label']" :checkbox="$key">
                                    <input type="checkbox" class="form-check-input" id="{{ $key }}"
                                           wire:model.lazy="state.attributes.{{ $key }}">
                                </x-field-section-checkbox>
                            @endforeach
                    @endif
                    <x-field-section class="col-12" label="Location">
                        <div class="card">
                            <div class="card-body">
                                @if(isset($location))
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#locationModal">
                                            <i class="fa fa-pencil-square"></i> Change
                                        </button>
                                    </div>
                                    <div class="pull-left">
                                        <h4>{{ $location->full_name }}</h4>
                                        <p>{{ $location->full_address }}</p>
                                    </div>
                                @else
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#locationModal">
                                        Set Location
                                    </button>
                                @endif
                            </div>
                        </div>
                    </x-field-section>

                    @if ($imageList->count())
                        <x-field-section class="col-xs-12" label="Photos">
                            <div class="card">
                                <div class="card-body d-flex flex-row flex-wrap animal-thumbs">
                                    @foreach($imageList as $image)
                                        <div class="flex-fill text-center mb-4 mx-2 p-2">
                                            <div class="d-inline-block position-relative">
                                                <img
                                                    src="{{ url('storage/' . config('mtar.animal_image_path') . '/' . $image) }}">
                                                @unless($loop->index)
                                                    <span class="cover text-warning"><i
                                                            class="material-icons-star"></i></span>
                                                @endunless
                                            </div>
                                            <div>
                                                <span></span>
                                                <button wire:click="deleteImage('{{ $image }}')"
                                                        class="btn btn-sm btn-danger" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                                <button wire:click="setCover('{{ $image }}')"
                                                        class="btn btn-sm {{ $loop->index ? 'btn-success' : 'btn-default' }}"
                                                        title="Set as cover photo" {{ $loop->index ? null : 'disabled' }}>
                                                    <i
                                                        class="fa fa-star"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </x-field-section>
                    @endif
                    <x-field-section class="col-xs-12" label="Upload Image">
                        <input wire:model="upload" class="form-control" type="file" multiple id="upload"
                               value="Browse">
                    </x-field-section>

                    <x-field-section wire:ignore class="col-xs-12 mt-5" label="Description">
                        <span class="text-danger">Anything written in this box will appear on the website.</span>
                        <textarea wire:model.defer="state.description" class="form-control"
                                  id="description"></textarea>
                    </x-field-section>

                    <x-field-section wire:ignore class="col-xs-12" label="Short Description">
                        <textarea wire:model.defer="state.short_description" class="form-control"
                                  id="short_description"></textarea>
                    </x-field-section>

                    <x-field-section class="col-xs-12 my-5" label="Booked By">
                        <input type="text" wire:model.defer="state.booking_info" class="form-control"
                                  id="booking_info">
                    </x-field-section>

                    <x-field-section wire:ignore class="col-xs-12" label="Medical Notes">
                        <textarea wire:model.defer="state.medical_note" class="form-control"
                                  id="medical_note"></textarea>
                        <button class="btn btn-xs btn-primary-alternate mt-2 py-1 mb-4" onclick="addMedicalSection()">Add a section</button>
                    </x-field-section>

                    <x-field-section wire:ignore class="col-xs-12" label="Assessment Notes">
                        <textarea wire:model.defer="state.assessment_note" class="form-control"
                                  id="assessment_note"></textarea>
                    </x-field-section>

                    <x-field-section wire:ignore class="col-xs-12" label="Other Notes">
                        <textarea wire:model.defer="state.other_note" class="form-control"
                                  id="other_note"></textarea>
                    </x-field-section>
                @endif
                <div class="col-12 text-center mt-3">
                    <span></span>
                    @if (! $animal->id)
                        <button wire:click.prevent="createAnimal" class="btn btn-primary">Create and Contine</button>
                    @else
                        <button wire:click.prevent="saveAnimal" onclick="updateEditorFields()" class="btn btn-primary"
                        >Save and Close
                        </button>
                    @endif

                    <a class="btn btn-danger ml-4" href="{{ route('animals.index') }}">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .form-label-outside {
        font-weight: 900;
        color: #158fbb;
    }

    input:focus {
        background: #efefef !important;
    }

    .form-group {
        margin-bottom: 10px !important;
    }

    input[type="text"].form-control, input[type="checkbox"].form-control, input[type=date].form-control, select.form-control {
        max-height: 30px !important;
        min-height: 30px !important;
        line-height: 30px !important;
        height: auto;
        border: 1px solid #04BDFF !important;
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }

    input {
        border: 1px solid #04BDFF !important;
    }

    input[aria-invalid="true"], textarea[aria-invalid="true"] {
        border: 1px solid #f00;
        box-shadow: 0 0 4px 0 #f00;
    }

    .animal-thumbs {

    }

    .animal-thumbs img {
        height: 120px;
        width: auto;
    }

    .animal-thumbs .btn {
        margin-top: 5px !important;
    }

    .animal-thumbs .cover {
        position: absolute;
        right: 2px;
        top: -6px;
        font-size: 26px;
    }

    .select2-selection--single {
        border-radius: 0 !important;
        border: 1px solid #04BDFF !important;
        background-color: #f5f5f5 !important;
        max-height: 30px !important;
    }

    .select2-selection__rendered {
        letter-spacing: 0 !important;
        font-size: 14px !important;
    }
</style>
<script type="text/javascript">
    let selectedBreed = '{{ $state['breed'] ?? '' }}';
    const editorFields = ['description', 'short_description', 'medical_note', 'assessment_note', 'other_note']

    const editorOptions = {
        filebrowserBrowseUrl: '/js/ckfinder/browse.php?opener=ckeditor&type=files',
        filebrowserImageBrowseUrl: '/js/ckfinder/browse.php?opener=ckeditor&type=images',
        filebrowserFlashBrowseUrl: '/js/ckfinder/browse.php?opener=ckeditor&type=flash',
        filebrowserUploadUrl: '/js/ckfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl: '/js/ckfinder/upload.php?opener=ckeditor&type=images',
        filebrowserFlashUploadUrl: '/js/ckfinder/upload.php?opener=ckeditor&type=flash',
        }

    $(document).ready(function () {
        CKEDITOR.on('instanceReady', function (ev) {

            let tags = ['p', 'ol', 'ul', 'li', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'table', 'tbody', 'tr', 'td', 'th', 'tfoot'];

            for (let key in tags) {
                ev.editor.dataProcessor.writer.setRules(tags[key],
                    {
                        indent: false,
                        breakBeforeOpen: false,
                        breakAfterOpen: false,
                        breakBeforeClose: false,
                        breakAfterClose: false
                    });
            }
        })

        initialiseComponents()
        initialiseSelect2()

        window.livewire.on('initialiseComponents', function (state) {
            initialiseComponents(state)
        })

        Livewire.hook('message.processed', (message, component) => {
            initialiseSelect2()
            if (selectedBreed !== $('#breed').val()) {
                let newOption = new Option(selectedBreed, selectedBreed, false, false)
                $('#breed').append(newOption)
                $('#breed').val(selectedBreed).trigger('change.select2')
            }
        })
    })

    function initialiseSelect2() {
        $('#breed').select2({tags: true})
            .on('change', (e) => {
            selectedBreed = e.target.value
        @this.set('state.breed', e.target.value)
        });
    }

    function initialiseComponents() {
        editorFields.forEach(editorName => {
            if (document.getElementById(editorName).style['display'] === 'none')
                return;

            if (CKEDITOR.instances[editorName]) {
                CKEDITOR.instances[editorName].destroy(true)
            }
            CKEDITOR.replace(editorName, editorOptions)
            CKEDITOR.instances[editorName].on('blur', function (e) {
                document.getElementById(editorName).value = CKEDITOR.instances[editorName].getData()
                document.getElementById(editorName).dispatchEvent(new InputEvent('input'))
            })
        })
    }

    function updateEditorFields() {
        editorFields.forEach(editorName => {
            document.getElementById(editorName).value = CKEDITOR.instances[editorName].getData()
            document.getElementById(editorName).dispatchEvent(new InputEvent('input'))
        })
    }

    function addMedicalSection() {
        let editor = CKEDITOR.instances.medical_note

        let tableMarkdown = `{!! config('mtar.animal_form.medical_notes_template') !!}`

        editor.insertHtml(tableMarkdown);
    }

</script>
