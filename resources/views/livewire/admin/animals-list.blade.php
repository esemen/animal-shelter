<div class="shell">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row mb-4">
        <div class="col">
            <div class="pull-left mb-4">
                <h2>animals</h2>
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

            <input wire:model="search" class="form-control" type="text" placeholder="Search Animals...">
            <button class="btn btn-info"wire:click="clear">Clear</button>
        </div>
    </div>

    <div class="row">
        <table class="table table-bordered table-responsive-lg">
            <thead>
            <tr data-table-header>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                        Full Name
                        @include('includes._sort-icon', ['field' => 'first_name'])
                    </a></th>
                {{--                <th><a wire:click.prevent="sortBy('first_name')" role="button" href="#">--}}
                {{--                        First Name--}}
                {{--                        @include('includes._sort-icon', ['field' => 'first_name'])--}}
                {{--                    </a></th>--}}
                {{--                <th><a wire:click.prevent="sortBy('last_name')" role="button" href="#">--}}
                {{--                        Last Name--}}
                {{--                        @include('includes._sort-icon', ['field' => 'last_name'])--}}
                {{--                    </a></th>--}}
                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">
                        Status
                        @include('includes._sort-icon', ['field' => 'status'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('incoming')" role="button" href="#">
                        Created At
                        @include('includes._sort-icon', ['field' => 'dob'])
                    </a></th>
                <th class="text-center" style="max-width:100px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($animals as $animal)
                <tr>
                    <td><a href="{{ route('animals.show', $animal->uuid) }}" title="show">{{ $animal->name }}</a></td>
                    {{--                    <td>{{ $animal->first_name }}</td>--}}
                    {{--                    <td>{{ $animal->last_name }}</td>--}}
                    <td>{{ $animal->status->name }}</td>
                    <td>{{ $animal->created_at->format('m-d-Y') }}</td>
                    <td class="text-center px-1">
                        <a href="{{ route('animals.show', ['animal' => $animal]) }}" title="Show">
                            <i class="fa fa-eye text-success  fa-lg"></i>
                        </a>

                        @can('animal.edit')
                            <a href="{{ route('animals.edit', ['animal' => $animal]) }}" title="Animal Edits">
                                <i class="fa fa-key fa-lg text-warning"></i>
                            </a>
                        @endcan

                        @can('animal.delete')
                            <form action="{{ route('animals.destroy', ['animal' => $animal]) }}" method="POST"
                                  class="d-inline-block" onsubmit="return confirmDelete();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Delete" class="border-0 bg-transparent"><i
                                        class="fa fa-trash fa-lg text-danger"></i>
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col">
            @if ($animals->hasPages())
                <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
                    {{-- Previous Page Link --}}
                    @if ($animals->onFirstPage())
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                {!! __('pagination.previous') !!}
            </span>
                    @else
                        <a href="{{ $animals->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            {!! __('pagination.previous') !!}
                        </a>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($animals->hasMorePages())
                        <a href="{{ $animals->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
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
            Showing {{ $animals->firstItem() }} to {{ $animals->lastItem() }} out of {{ $animals->total() }} results
        </div>
    </div>
</div>
