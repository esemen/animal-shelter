<section class="cell-md-10 cell-xs-10 cell-lg-10">
    @livewire('admin.user-list')
</section>

{{--@extends('layouts.admin')--}}
{{--@section('content')--}}
{{--    <section class="cell-md-10 cell-xs-10 cell-lg-10">--}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <div class="pull-left mb-4">--}}
{{--                    <h2>Users</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        @if ($message = Session::get('success'))--}}
{{--            <div class="alert alert-success">--}}
{{--                <p>{{ $message }}</p>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <table class="table table-bordered table-responsive-lg" id="userTable">--}}
{{--            <thead>--}}
{{--            <tr class="data-table-header">--}}
{{--                <th>Name</th>--}}
{{--                <th>Email</th>--}}
{{--                <th>Mobile</th>--}}
{{--                <th>Postcode</th>--}}
{{--                <th>Town</th>--}}
{{--                <th>Register</th>--}}
{{--                <th class="text-center" style="max-width:100px">Action</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach ($users as $user)--}}
{{--                <tr>--}}
{{--                    <td><a href="{{ route('users.show', $user->uuid) }}" title="show">{{ $user->name }}</a></td>--}}
{{--                    <td>{{ $user->email }}</td>--}}
{{--                    <td>{{ $user->mobile }}</td>--}}
{{--                    <td>{{ $user->postcode }}</td>--}}
{{--                    <td>{{ $user->town }}</td>--}}
{{--                    <td>{{ formatDate($user->created_at) }}</td>--}}
{{--                    <td class="text-center px-1">--}}
{{--                        <a href="{{ route('users.show', ['user' => $user]) }}" title="Show">--}}
{{--                            <i class="fa fa-eye text-success  fa-lg"></i>--}}
{{--                        </a>--}}

{{--                        @can('user.edit')--}}
{{--                            <a href="{{ route('roles.edit', ['user' => $user]) }}" title="User Roles">--}}
{{--                                <i class="fa fa-key fa-lg text-warning"></i>--}}
{{--                            </a>--}}
{{--                        @endcan--}}

{{--                        @can('user.delete')--}}
{{--                            <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST"--}}
{{--                                  class="d-inline-block" onsubmit="return confirmDelete();">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button type="submit" title="Delete" class="border-0 bg-transparent"><i--}}
{{--                                        class="fa fa-trash fa-lg text-danger"></i>--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        @endcan--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--            <tfoot>--}}
{{--            <tr>--}}
{{--                <th>Name</th>--}}
{{--                <th>Email</th>--}}
{{--                <th>Mobile</th>--}}
{{--                <th>Postcode</th>--}}
{{--                <th>Town</th>--}}
{{--                <th>Register</th>--}}
{{--                <th></th>--}}
{{--            </tr>--}}
{{--            </tfoot>--}}
{{--        </table>--}}
{{--        {{$users->links()}}--}}
{{--    </section>--}}
{{--@endsection--}}

{{--@push('page-scripts')--}}
{{--    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>--}}
{{--    <script>--}}
{{--        function confirmDelete() {--}}
{{--            return confirm('Are you sure you want to delete?');--}}
{{--        }--}}

{{--        $(document).ready(function () {--}}
{{--            // Setup - add a text input to each footer cell--}}
{{--            $('#userTable tfoot th').each(function () {--}}
{{--                let title = $(this).text();--}}
{{--                if (title) {--}}
{{--                    $(this).html('<input type="text" class="w-100" placeholder="Search ' + title + '" />');--}}
{{--                }--}}
{{--            });--}}

{{--            $('#userTable').DataTable({--}}
{{--                searching: true,--}}
{{--                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],--}}
{{--                // pageLength: 10,--}}
{{--                paging:   false,--}}
{{--                columnDefs: [{--}}
{{--                    targets: [6],--}}
{{--                    searchable: false,--}}
{{--                    orderable: false,--}}
{{--                }],--}}
{{--                initComplete: function () {--}}
{{--                    // Apply the search--}}
{{--                    this.api().columns().every(function () {--}}
{{--                        var that = this;--}}

{{--                        $('input', this.footer()).on('keyup change clear', function () {--}}
{{--                            if (that.search() !== this.value) {--}}
{{--                                that--}}
{{--                                    .search(this.value)--}}
{{--                                    .draw();--}}
{{--                            }--}}
{{--                        });--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}

{{--@push('styles')--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"></link>--}}

{{--    <style type="text/css">--}}
{{--        .dataTables_filter {--}}
{{--            visibility: hidden;--}}
{{--        }--}}

{{--        #userTable thead {--}}
{{--            background-color: #FAFAFA;--}}
{{--        }--}}

{{--        #userTable tfoot {--}}
{{--            background-color: #EEEEEE;--}}
{{--        }--}}
{{--    </style>--}}
{{--@endpush--}}
