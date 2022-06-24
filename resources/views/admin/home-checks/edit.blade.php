@extends('layouts.admin')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('home-checks.update', ['home_check' => $homeCheck]) }}">
            @csrf
            @method('PUT')
            <div class="card mb-5 shadow">
                <div class="card-body">
                    <h4><i class="fa fa-file-text"></i> Home Check Assessment</h4>
                    <hr class="my-3">

                    <div class="row">
                        <div class="col-lg-6">
                            <x-field-section label="Home Check Date">
                                <input name="check_date" class="form-control" type="date">
                                @error('check_date')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </x-field-section>
                        </div>
                        <div class="col-lg-6">
                            <x-field-section label="Opinion">
                                <select name="opinion" class="form-control">
                                    <option value="">Please select</option>
                                    <option value="1">1. Not a good fit</option>
                                    <option value="2">2.</option>
                                    <option value="3">3.</option>
                                    <option value="4">4.</option>
                                    <option value="5">5. Excellent fit</option>
                                </select>
                                @error('opinion')
                                <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </x-field-section>
                        </div>
                    </div>
                    <x-field-section label="Notes">
                        <textarea name="notes" class="form-control" type="date"></textarea>
                        @error('notes')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </x-field-section>

                    <div class="text-center">
                        <span></span>
                        <button type="submit" class="btn btn-success mr-2"><i class="fa fa-check"></i> Save</button>
                        <a href="{{ route('home-checks.index') }}" class="btn btn-danger"><i class="fa fa-undo"></i> Return</a>
                    </div>
                </div>
            </div>
        </form>

        <x-applications.applicant-information-card :application="$homeCheck->application" class="bg-light mb-4"/>
        <x-applications.application-information-card :application="$homeCheck->application" class="bg-light mb-4"/>
    </div>

@endsection

@push('styles')
    <style type="text/css">
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
    </style>
@endpush
