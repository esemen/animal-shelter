@extends('layouts.admin')

@section('content')
    <div class="px-5">
        <div class="row">
            <div class="col">
                <h3 class="mb-4">Pending Home Checks</h3>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Animal</th>
                        <th scope="col">Breed</th>
                        <th scope="col">Type</th>
                        <th scope="col">Applicant</th>
                        <th scope="col">Town</th>
                        <th scope="col">Postcode</th>
                        <th scope="col">Mobile</th>
                        <th class="text-center" style="max-width:100px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($homeChecks as $check)
                        <tr>
                            <td><a href="{{ route('animals.show', $check->application->animal) }}"
                                   target="_blank">{{ $check->application->animal->name }}</a></td>
                            <td>{{ $check->application->animal->breed }}</td>
                            <td>{{ str_replace(' Animal', '', $check->application->animal->type->name) }}</td>
                            <td>
                                {{ $check->application->user->fullName }}
                            </td>
                            <td>{{$check->application->user->town}}</td>
                            <td>{{$check->application->user->postcode}}</td>
                            <td>{{$check->application->user->mobile}}</td>
                            <td class="text-center px-1">
                                @can('vetter.home-check')
                                    <a href="{{ route('home-checks.edit', ['home_check' => $check]) }}" title="Home Check Details">
                                        <i class="fas fa-edit fa-lg text-primary"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <td colspan="1000">
                            <p class="text-center pt-5 text-gray-darker">
                                No application was found waiting for your action
                            </p>
                        </td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
