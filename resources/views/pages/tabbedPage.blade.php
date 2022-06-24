@extends('layouts.app')

@section('content')
    <section class="section-md-top-new-pages bg-white text-center">
        <div class="shell">
            <div class="range range-sm-center spacing-30">
                <div class="cell-sm-10">
                    <h2>{{ $title }}</h2>

                    <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs">
                        <!-- Nav tabs-->
                        <ul class="nav nav-tabs">
                            @foreach ($tabs as $i => $tab)
                                <li class="{{ $i ? null : 'active' }}"><a href="#{{ $tab->slug }}"
                                                                          data-toggle="tab"
                                                                          aria-expanded="{{ $i ? 'false' : 'true' }}">{{ $tab->name }}</a>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Tab panes-->
                        <div class="tab-content">
                            @foreach ($tabs as $i => $tab)
                                <div class="tab-pane fade {{ $i == 0 ? 'in active' : null }}" id="{{ $tab->slug }}">
                                    <div class="panel-group panel-group-custom panel-group-corporate"
                                         id="accordion-{{ $tab->slug }}"
                                         role="tablist">
                                        @foreach ($tab->pages as $page)
                                            <div class="panel panel-custom panel-corporate">
                                                <div class="panel-heading" id="accordion-heading-{{ $page->slug }}"
                                                     role="tab">
                                                    <div class="panel-title">
                                                        <a role="button" data-toggle="collapse"
                                                           data-parent="#accordion-{{ $tab->slug }}"
                                                           href="#accordion-collapse-{{ $page->slug }}"
                                                           aria-controls="accordion-collapse-{{ $page->slug }}"
                                                           aria-expanded="false" class="collapsed">{{ $page->title }}
                                                            <div class="panel-arrow"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="panel-collapse collapse"
                                                     id="accordion-collapse-{{ $page->slug }}"
                                                     role="tabpanel"
                                                     aria-labelledby="accordion-heading-{{ $page->slug }}"
                                                     aria-expanded="false">
                                                    <ul class="post-meta">
                                                        <li><span
                                                                class="icon icon-xs icon-tan-hide material-icons-access_time"></span>
                                                            <time
                                                                datetime="{{ $page->created_at }}">{{ formatDate($page->created_at) }}</time>
                                                        </li>
                                                    </ul>
                                                    <div class="range range-sm-center">
                                                        <div class="cell-sm-9 cell-md-12">
                                                            <article class="">
                                                                {!! $page->content !!}
                                                            </article>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
