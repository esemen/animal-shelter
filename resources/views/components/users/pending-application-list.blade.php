@props([
    'applications' => [],
    'routeTo' => '' // users.vetter.show | users.fosterer.show
])

<table class="table table-bordered table-responsive-lg user-data-table">
    <thead>
    <tr class="data-table-header">
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Postcode</th>
        <th>Town</th>
        <th>Date</th>
        <th class="text-center" style="max-width:100px">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($applications as $application)
        <tr>
            <td>{{ $application->user->name }}</a></td>
            <td>{{ $application->user->email }}</td>
            <td>{{ $application->user->mobile }}</td>
            <td>{{ $application->user->postcode }}</td>
            <td>{{ $application->user->town }}</td>
            <td>{{ formatDate($application->created_at) }}</td>
            <td class="text-center px-1">
                @can('user.edit')
                    <a href="{{ route($routeTo, ['application' => $application]) }}">
                        <i class="fas fa-edit  fa-lg"></i>
                    </a>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Postcode</th>
        <th>Town</th>
        <th>Register</th>
        <th></th>
    </tr>
    </tfoot>
</table>
