<div class="shell mt-5">
    <!-- Bootstrap tabs-->
    <div class="tabs tabs-custom tabs-vertical tabs-corporate tabs-wide" id="tabs-1" data-url-tabs="false">
        <!-- Nav tabs-->
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab-adopt"
                   data-toggle="tab">Our {{ Str::plural(str_replace('Other', '', $animalType->name)) }}</a>
            </li>
            @if($animalType->name == 'Dog')
            @foreach($dogAdoptionPages as $page)
                <li><a href="#tab-{{ $page->slug }}" data-toggle="tab">{{ $page->title }}</a></li>
            @endforeach
            @elseif($animalType->name == 'Cat')
                @foreach($catAdoptionPages as $page)
                    <li><a href="#tab-{{ $page->slug }}" data-toggle="tab">{{ $page->title }}</a></li>
                @endforeach
            @else
                @foreach($otherAdoptionPages as $page)
                    <li><a href="#tab-{{ $page->slug }}" data-toggle="tab">{{ $page->title }}</a></li>
                @endforeach
            @endif
            <li><a href="#tab-reserved"
                   data-toggle="tab">Reserved {{ Str::plural(str_replace('Other', '', $animalType->name)) }}</a></li>
        </ul>
        <!-- Tab panes-->
        <div class="tab-content">
            <!-- Adopt Tab -->
            <div class="tab-pane fade in active" id="tab-adopt">
                <div>
                    @forelse($animals as $animal)
                        <x-animals.search-result-item :animal="$animal"/>
                    @empty
                        <div class="p-5 my-5 text-center text-danger">No animals matching these conditions were
                            found
                        </div>
                    @endforelse
                        <p>Available animals: {{ $animals->total() }}</p>
                    @if ($animals->count())
                        @if($animals->onEachSide(2)->links())
                            <p>{{ "Page " . $animals->currentPage() . "  of  " . $animals->lastPage() }}</p>
                            <ul class="pagination-custom"
                                style="text-align: center; margin: 0 auto; margin-top: 25px; color: #04BDFF">
                                @if($animals->onFirstPage())
                                    <li class="disabled"><span>{{ __('Prev') }}</span></li>
                                @else
                                    <li><a href="{{ $animals->previousPageUrl() }}" rel="prev"
                                           aria-label="Previous">{{ __('') }}</a></li>
                                @endif
{{--                                    @for ($i = 1; $i <= $animals->lastPage(); $i++)--}}
{{--                                        <li class="{{ ($animals->currentPage() === $i) ? ' active' : '' }} page-item">--}}
{{--                                            <a class=" page-link " href="{{ $animals->url($i) }}">{{ $i }}</a>--}}
{{--                                        </li>--}}
{{--                                    @endfor--}}
                                @if($animals->hasMorePages())
                                    <li><a href="{{ $animals->nextPageUrl() }}" rel="next"
                                           aria-label="Next">{{ __('') }}</a></li>
                                @else
                                    <li class="disabled"><span>{{ __('Next') }}</span></li>
                                @endif
                            </ul>
                        @endif
                    @endif
                </div>
            </div>
            <!-- Reserved Tab -->
            <div class="tab-pane fade" id="tab-reserved">
                <div>
                    @forelse($reservedAnimals as $animal)
                        <x-animals.search-result-item :animal="$animal"/>
                    @empty
                        <div class="p-5 my-5 text-center text-danger">No animals matching these conditions were
                            found
                        </div>
                    @endforelse
                        @if ($reservedAnimals->count())
                            @if($reservedAnimals->onEachSide(3)->links())
                                <p>{{ "Page " . $reservedAnimals->currentPage() . "  of  " . $reservedAnimals->lastPage() }}</p>
                                <ul class="pagination-custom"
                                    style="text-align: center; margin: 0 auto; margin-top: 25px; color: #04BDFF">
                                    @if($reservedAnimals->onFirstPage())
                                        <li class="disabled"><span>{{ __('Prev') }}</span></li>
                                    @else
                                        <li><a href="{{ $animals->previousPageUrl() }}" rel="prev"
                                               aria-label="Previous">{{ __('') }}</a></li>
                                    @endif
{{--                                    @for ($i = 1; $i <= $reservedAnimals->lastPage(); $i++)--}}
{{--                                        <li class="{{ ($reservedAnimals->currentPage() === $i) ? ' active' : '' }} page-item">--}}
{{--                                            <a class=" page-link " href="{{ $reservedAnimals->url($i) }}">{{ $i }}</a>--}}
{{--                                        </li>--}}
{{--                                    @endfor--}}
                                    @if($reservedAnimals->hasMorePages())
                                        <li><a href="{{ $reservedAnimals->nextPageUrl() }}" rel="next"
                                               aria-label="Next">{{ __('') }}</a></li>
                                    @else
                                        <li class="disabled"><span>{{ __('Next') }}</span></li>
                                    @endif
                                </ul>
                            @endif
                        @endif
                </div>
            </div>
            <!-- Custom pages -->
            @if($animalType->name = 'Dog')
                @foreach($dogAdoptionPages as $page)
                                    <div class="tab-pane fade" id="tab-{{ $page->slug }}">
                                        {!! $page->content !!}
                                    </div>
                @endforeach
            @elseif($animalType->name = 'Cat')
                @foreach($catAdoptionPages as $page_cat)
                    <div class="tab-pane fade" id="tab-{{ $page_cat->slug }}">
                        {!! $page_cat->content !!}
                    </div>
                @endforeach
            @else
                @foreach($otherAdoptionPages as $page)
                    <li><a href="#tab-{{ $page->slug }}" data-toggle="tab">{{ $page->title }}</a></li>
                @endforeach
            @endif
        </div>
    </div>
</div>
