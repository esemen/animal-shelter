@extends('layouts.admin')
@section('content')
    <section class="cell-md-10 cell-xs-10 cell-lg-10">
        <div class="row">
            <div class="col">
                <div class="pull-left">
                    <h2>Animals
                        @if (isset($animalStatus))
                            ({{ $animalStatus->name }})
                        @endif
                    </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('animals.create') }}" title="Create a animal"> <i
                            class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered table-responsive-lg stripe" id="animalTable">
            <thead>
            <tr>
                <th style="width:100px">Type</th>
                <th>Name</th>
                <th style="width:70px">Gender</th>
                <th style="width:100px">DOB</th>
                <th style="width:80px">Age</th>
                <th style="width:100px">Incoming</th>
                <th style="width:120px">Microchip</th>
                <th style="width:100px">Spay/Neutered</th>
                <th style="width:100px">Neuter Due</th>
                <th>Location</th>
                <th>Status</th>
                <th class="text-center" style="width:80px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($animals as $animal)
                <tr>
                    <td>{{ str_replace(' Animal', '', $animal->type->name) }}</td>
                    <td><a href="{{ route('animals.show', $animal->id) }}" title="show">{{ $animal->name }}</a></td>
                    <td>{{ $animal->sex }}</td>
                    <td>{{ formatDate($animal->dob) }}</td>
                    <td>{{ $animal->ageText }}</td>
                    <td>{{ formatDate($animal->incoming) }}</td>
                    <td>{{ $animal->microchip1 }}</td>
                    <td>{{ formatDate($animal->neutered) }}</td>
                    <td>{{ formatDate($animal->neuter_due) }}</td>
                    <td>{{ $animal->location->town ?? '-' }}</td>
                    <td>{{ $animal->status->name }}</td>
                    <td class="text-center px-1">
                        <a href="{{ route('animals.show', $animal->id) }}" title="show">
                            <i class="fa fa-eye text-success  fa-lg"></i>
                        </a>

                        @can('animal.edit')
                            <a href="{{ route('animals.edit', $animal->id) }}">
                                <i class="fa fa-edit  fa-lg"></i>
                            </a>
                        @endcan

                        @can('animal.delete')
                            <form action="{{ route('animals.destroy', $animal->id) }}" method="POST"
                                  class="d-inline-block" onsubmit="return confirmDelete();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="delete" class="border-0 bg-transparent"><i
                                        class="fa fa-trash fa-lg text-danger"></i>
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Age</th>
                <th>Incoming</th>
                <th>Microchip</th>
                <th>Spay/Neutered</th>
                <th>Neuter Due</th>
                <th>Location</th>
                <th>Status</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    </section>
@endsection


@push('page-scripts')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete?');
        }

        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#animalTable tfoot th').each(function () {
                let title = $(this).text();
                if (title) {
                    $(this).html('<input type="text" class="w-100" placeholder="Search ' + title + '" />');
                }
            });

            $('#animalTable').DataTable({
                searching: true,
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                // pageLength: 10,
                paging: false,
                columnDefs: [{
                    targets: [11],
                    searchable: false,
                    orderable: false,
                }],
                initComplete: function () {
                    // Apply the search
                    this.api().columns().every(function () {
                        var that = this;

                        $('input', this.footer()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();
                            }
                        });
                    });
                }
            });
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"></link>

    <style type="text/css">
        .dataTables_filter {
            visibility: hidden;
        }

        #animalTable thead {
            background-color: #FAFAFA;
        }

        #animalTable tfoot {
            background-color: #EEEEEE;
        }
    </style>
@endpush
