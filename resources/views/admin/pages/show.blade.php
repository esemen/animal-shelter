@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div>
                    <div class="pull-right">
                        <span></span>
                        @can('page.edit')
                            <a class="btn btn-success mt-0" href="{{ route('pages.edit', $page) }}" title="Edit Page">
                                <i
                                    class="fas fa-pencil"></i>
                            </a>
                        @endcan
                        @can('page.delete')
                            <form class="d-inline" onsubmit="return confirm('Do you really want to delete the page?');"
                                  action="{{ route('pages.destroy', $page) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger mt-0" title="Delete Page"><i
                                        class="fas fa-trash"></i>
                                </button>
                            </form>
                        @endcan
                        <a class="btn btn-secondary mt-0" href="{{ route('pages.index') }}" title="Return to List"> <i
                                class="fas fa-undo"></i>
                        </a>
                    </div>
                    <h2>{{ $page->title }} </h2>
                    <h5 class="d-inline text-muted">{{ $page->slug }}</h5>
{{--                    <div class="card mt-4">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title text-bold">Preview</h5>--}}
{{--                            <hr/>--}}
{{--                            {!! $page->preview !!}--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="card mt-5">
                        <div class="card-body">
                            <h5 class="card-title text-bold">Content</h5>
                            <hr/>
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
