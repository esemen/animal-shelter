@push('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
@endpush
<div class="shell">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row mb-4">
        <div class="col">
            <div class="pull-left mb-4">
                <h2>Applications</h2>
            </div>
        </div>
        <div class="col form-inline form-bordered">
            <label for="perPage"></label>Per Page:
            <select wire:model="perPage" id="perPage" class="form-control">
                <option>10</option>
                <option>15</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>

            <input wire:model="search" class="form-control" type="text" placeholder="Search in Applications...">
            <button class="btn btn-info"wire:click="clear">Clear</button>
        </div>
    </div>

    <div class="row">
        <table class="table table-bordered table-responsive-lg">
            <thead>
            <tr data-table-header>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                       Animal Name
                        @include('includes._sort-icon', ['field' => 'name'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('application_status_id')" role="button" href="#">
                       Application Status
                        @include('includes._sort-icon', ['field' => 'application_status_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        Created At
                        @include('includes._sort-icon', ['field' => 'birthdate'])
                    </a></th>
                <th class="text-center" style="max-width:100px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($applications as $application)
                <tr>
                    <td><a href="{{ route('applications.show', $application->uuid) }}" title="show">{{ $application->animal->name }}</a></td>
                    <td>{{ $application->status->name }}</td>
                    <td>{{ $application->created_at->format('m-d-Y') }}</td>
                    <td class="text-center px-1">
                        <a href="{{ route('applications.show', ['application' => $application]) }}" title="Show">
                            <i class="fa fa-eye text-success  fa-lg"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col">
            @if ($applications->hasPages())
                <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
                    {{-- Previous Page Link --}}
                    @if ($applications->onFirstPage())
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                {!! __('pagination.previous') !!}
            </span>
                    @else
                        <a href="{{ $applications->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            {!! __('pagination.previous') !!}
                        </a>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($applications->hasMorePages())
                        <a href="{{ $applications->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            {!! __('pagination.next') !!}
                        </a>
                    @else
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                {!! __('pagination.next') !!}
            </span>
                    @endif
                </nav>
            @endif
        </div>

        <div class="col text-right text-muted">
            Showing {{ $applications->firstItem() }} to {{ $applications->lastItem() }} out of {{ $applications->total() }} results
        </div>
    </div>
</div>
