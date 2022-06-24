@props([
    'application' => null,
    'selectedVetter' => null,
])

<!-- Modal -->
<div class="modal fade" wire:ignore.self id="homeCheckModal" tabindex="-1" role="dialog"
     aria-labelledby="locationModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="locationModalTitle">Assign Vetter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="vetterSearchTerm">Search</label>
                    <input wire:model="vetterSearch" class="form-control"
                           type="text" id="vetterSearchTerm" placeholder="Search for a name">
                </div>
                <div class="list-group" style="max-height: 400px; margin-bottom: 10px; overflow-y: auto;
    -webkit-overflow-scrolling: touch;">
                    @forelse ($this->vetterSearchResults as $user)
                        <button wire:click="setVetter('{{ $user->uuid }}')" data-dismiss="modal"
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
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div {{ $attributes->exceptProps(['application'])->merge(['class' => 'card']) }}>
    <div class="card-body">
        <h4 class="d-block my-2"><i class="fa fa-home"></i> Home Check Information</h4>
        <hr>

        @if(! $application->homeCheck)
            <div class="text-center">
                <p class="py-2">No home check assigned for this application</p>

                @can('application.edit')
                    @if ($selectedVetter)
                        <h5>{{ $selectedVetter->fullName }}</h5>
                        <button wire:click="assignVetter" class="btn btn-success my-3"><i class="fa fa-check"></i>
                            Assign the vetter for home check
                        </button>
                    @else
                        <button class="btn btn-primary my-3"
                                data-toggle="modal"
                                data-target="#homeCheckModal">Assign a vetter
                        </button>
                    @endif
                @endcan
            </div>
        @else
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="d-block p-0 m-3"><i class="fa fa-stethoscope"></i> Vetter Information</h5>
                    <x-field-inline label="Name">{{ $application->homeCheck->user->fullName }}</x-field-inline>
                    <x-field-inline label="Email">{{ $application->homeCheck->user->email }}</x-field-inline>
                    <x-field-inline label="Mobile">{{ $application->homeCheck->user->mobile }}</x-field-inline>
                </div>
                <div class="col-lg-6">
                    <h5 class="d-block p-0 m-3"><i class="fa fa-file-text-o"></i> Assessment</h5>
                    @if ($application->homeCheck->completed)
                        <p>
                            {{ formatDate($application->homeCheck->check_date) }}
                            <span class="pull-right pr-2 d-inline-block text-nowrap">
                            @foreach(range(1,5) as $i)
                                    @if ($i <= $application->homeCheck->opinion)
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-star-o text-gray-darker" aria-hidden="true"></i>
                                    @endif
                                @endforeach
                            </span>
                        </p>
                        <p>
                            {{ $application->homeCheck->notes }}
                        </p>
                    @else
                        <p>Assessment not finished yet</p>
                    @endif
                </div>
            </div>
        @endif

    </div>
</div>
