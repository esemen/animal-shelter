@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div>
                    @can('page.edit')
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('pages.create') }}" title="Create page"> <i
                                    class="fas fa-plus-circle"></i>
                            </a>
                        </div>
                    @endcan
                    <h2>Pages</h2>
                </div>
                <form method="GET">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h5>Search Pages</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="page_type">Page Type</label>
                                        <select class="form-control" name="page_type" id="page_type">
                                            <option value="">All Types</option>
                                            @foreach($pageTypes as $pageType)
                                                <option
                                                    value="{{ $pageType->slug }}"
                                                    {{ request('page_type') === $pageType->slug ? 'selected' : null }}>
                                                    {{ $pageType->long_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Page Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               placeholder="Page title"
                                               value="{{ request('title') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-3">
                                <button type="submit" class="btn btn-xs btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered mt-4">
                    <thead>
                    <tr class="bg-light">
                        <th scope="col"><h5>Type</h5></th>
                        <th scope="col"><h5>Title</h5></th>
                        <th scope="col"><h5>Slug</h5></th>
                        <th scope="col" style="width: 140px"><h5>Last Update</h5></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($pages as $page)
                        <tr>
                            <td>
                                {{ $page->pageType->name }}
                            </td>
                            <td>
                                <a href="{{ route('pages.show', $page) }}">{{ $page->title }}</a>
                            </td>
                            <td>
                                @if($page->pageType->routable)
                                    <a href="{{ url($page->pageType->prefix.'/'.$page->slug) }}"
                                       target="_blank">{{ $page->slug }}</a>
                                @else
                                    {{ $page->slug }}
                                @endif
                            </td>
                            <td>
                                {{ formatDate($page->updated_at) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100">
                                <p class="p-5 text-center text-gray-darker">No pages found</p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                @if($pages->onEachSide(4)->links())
                    <p>{{ "Page " . $pages->currentPage() . "  of  " . $pages->lastPage() }}</p>
                    <ul class="pagination-custom"
                        style="text-align: center; margin: 0 auto; margin-top: 25px; color: #04BDFF">
                        @if($pages->onFirstPage())
                            <li class="disabled"><span>{{ __('Prev') }}</span></li>
                        @else
                            <li><a href="{{ $pages->previousPageUrl() }}" rel="prev"
                                   aria-label="Previous">{{ __('') }}</a></li>
                        @endif
                        @if($pages->hasMorePages())
                            <li><a href="{{ $pages->nextPageUrl() }}" rel="next" aria-label="Next">{{ __('') }}</a></li>
                        @else
                            <li class="disabled"><span>{{ __('Next') }}</span></li>
                        @endif
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
