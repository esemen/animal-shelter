@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Edit page</h2>
        <div class="card mt-3">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('pages.update', $page) }}">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label for="title">Page Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Page title"
                                       value="{{ old('title', $page->title) }}">
                                @error('title')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug"
                                       value="{{ old('slug', $page->slug) }}">
                                @error('slug')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="title">Page Type</label>
                                <select class="form-control" name="page_type_id">
                                    @foreach($pageTypes as $pageType)
                                        <option
                                            value="{{ $pageType->id }}"
                                            {{ old('page_type_id', $page->pageType->id) === $pageType->id ? 'selected' : null }}>
                                            {{ $pageType->long_name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('page_type_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

{{--                    <div class="form-group mt-3">--}}
{{--                        <label for="preview">Preview</label>--}}
{{--                        <textarea class="form-control ckeditor" id="preview"--}}
{{--                                  name="preview">{{ old('preview', $page->preview) }}</textarea>--}}
{{--                        @error('preview')--}}
{{--                        <small class="form-text text-danger">{{ $message }}</small>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <label for="content">Page Content</label>
                        <textarea class="form-control ckeditor" id="content"
                                  name="content">{{ old('content', $page->content) }}</textarea>
                        @error('content')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit" value="submit">Update Page</button>
                    <a class="btn btn-danger" href="{{ route('pages.index') }}">Return</a>
                </form>
            </div>
        </div>
    </div>
@endsection
