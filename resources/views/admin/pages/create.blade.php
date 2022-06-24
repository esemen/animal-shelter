@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Create a new page</h2>
        <div class="card mt-3">
            <div class="card-body">
                <form method="POST" action="{{ route('pages.store') }}">
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="page_type_id">Page Type</label>
                            <select class="form-control" name="page_type_id" id="page_type_id">
                                <option value="">Select</option>
                                @foreach($pageTypes as $pageType)
                                    <option
                                        value="{{ $pageType->id }}"
                                        {{ old('page_type_id') === $pageType->id ? 'selected' : null }}>
                                        {{ $pageType->long_name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('page_type_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
{{--                    @if($pageType->id === '5')--}}
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="page_order">Page Order - {{$pageType->id}}</label>
                                <input class="form-control" name="page_order" type="number" value="{{ old('page_order') }}">
                                @error('page_order')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
{{--                    @endif--}}
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="title">Page Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Page title"
                                   value="{{ old('title') }}">
                            @error('title')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" value="submit">Create Page</button>
                    <a class="btn btn-danger" href="{{ route('pages.index') }}">Return</a>
                </form>
            </div>
        </div>
    </div>
@endsection
