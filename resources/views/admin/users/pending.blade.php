@extends('layouts.admin')
@section('content')
    <section class="cell-md-10 cell-xs-10 cell-lg-10">
        <div class="row">
            <div class="col">
                <div class="pull-left mb-4">
                    <h2>Pending Applications</h2>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if($pendingVetters)
            <h4 class="my-4">Pending Vetter Applications ({{$pendingVetters->count()}})</h4>
            <x-users.pending-application-list :applications="$pendingVetters" routeTo="users.vetter.show"/>
        @endif

        @if($pendingFosterers)
            <h4 class="my-4">Pending Fosterer Applications ({{$pendingFosterers->count()}})</h4>
            <x-users.pending-application-list :applications="$pendingFosterers" routeTo="users.fosterer.show" />
        @endif
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
            $('.user-data-table tfoot th').each(function () {
                let title = $(this).text();
                if (title) {
                    $(this).html('<input type="text" class="w-100" placeholder="Search ' + title + '" />');
                }
            });

            $('.user-data-table').each(function () {
                $(this).DataTable({
                    searching: true,
                    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    pageLength: 10,
                    columnDefs: [{
                        targets: [6],
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
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"></link>

    <style type="text/css">
        .dataTables_filter {
            visibility: hidden;
        }

        .user-data-table thead {
            background-color: #FAFAFA;
        }

        .user-data-table tfoot {
            background-color: #EEEEEE;
        }
    </style>
@endpush
