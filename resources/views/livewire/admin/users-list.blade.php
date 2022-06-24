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
                <h2>Users</h2>
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

            <input wire:model="search" class="form-control" type="text" placeholder="Search Contacts...">
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
                <th><a wire:click.prevent="sortBy('email')" role="button" href="#">
                        Email
                        @include('includes._sort-icon', ['field' => 'email'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        Created At
                        @include('includes._sort-icon', ['field' => 'birthdate'])
                    </a></th>
                <th class="text-center" style="max-width:100px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><a href="{{ route('users.show', $user->uuid) }}" title="show">{{ $user->name }}</a></td>
{{--                    <td>{{ $user->first_name }}</td>--}}
{{--                    <td>{{ $user->last_name }}</td>--}}
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('m-d-Y') }}</td>
                                        <td class="text-center px-1">
                                            <a href="{{ route('users.show', ['user' => $user]) }}" title="Show">
                                                <i class="fa fa-eye text-success  fa-lg"></i>
                                            </a>

                                            @can('user.edit')
                                                <a href="{{ route('roles.edit', ['user' => $user]) }}" title="User Roles">
                                                    <i class="fa fa-key fa-lg text-warning"></i>
                                                </a>
                                            @endcan

                                            @can('user.delete')
                                                <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST"
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
{{--            {{ $users->onEachSide(4)->links() }}--}}
            @if ($users->hasPages())
                <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
                    {{-- Previous Page Link --}}
                    @if ($users->onFirstPage())
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                {!! __('pagination.previous') !!}
            </span>
                    @else
                        <a href="{{ $users->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            {!! __('pagination.previous') !!}
                        </a>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
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
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} out of {{ $users->total() }} results
        </div>
    </div>
</div>
