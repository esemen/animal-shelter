@props([
    'animal' => null
])

<!-- Thumbnail boxed horizontal-->
<div class="thumbnail-boxed thumbnail-boxed-horizontal ml-5 mb-5">
    <div class="thumbnail-boxed-left">
        <a class="btn" style="border-color: #04BDFF"
           href="{{ route('pet.show',['name' => $animal->slug, 'animal' => $animal]) }}">
            @if (collect($animal->images)->count())
                <img class="thumbnail-boxed-image"
                     src="{{ asset('storage/' . config('mtar.animal_image_path')  . '/' .  $animal->images[0]) }}"
                     alt="{{ $animal->name }}"/>
            @endif
        </a>
    </div>
    <div class="thumbnail-boxed-body">
        <p class="thumbnail-boxed-title"><a
                href="{{ route('pet.show',['name' => $animal->slug, 'animal' => $animal]) }}">{{ $animal->name }} </a>
        </p>
        <div class="thumbnail-boxed-text">
            {!! $animal->short_description !!}
        </div>
        <div class="thumbnail-boxed-footer">
            <ul class="thumbnail-boxed-meta">
                <li><i class="fa fa-paw"
                       aria-hidden="true"></i><span>{{ $animal->breed }}</span></li>
                <li><span
                        class="icon icon-xs icon-black-hide material-icons-invert_colors"></span><span>{{ $animal->colour }}</span>
                </li>
                <li>
                    <i class="fa {{ $animal->sex === 'Male' ? 'fa-mars' : 'fa-venus' }}"
                       aria-hidden="true"></i>
                    <span>{{ $animal->sex }}</span>
                </li>
                <li><span
                        class="icon icon-xs icon-black-hide material-icons-event_available"></span><span>{{ $animal->ageText ?? null }}</span>
                </li>
                <li>
                    @if(collect($animal->attributes)->contains('only_animal'))
                        <i class="fa fa-meh-o" aria-hidden="true"></i> Needs to be the
                        only animal
                    @else
                        <i class="fa fa-heartbeat" aria-hidden="true"></i> Friendly with
                        other animal
                    @endif
                </li>
                @if(collect($animal->attributes)->contains('show_passport'))
                    <li>
                        <i class="fa fa-certificate"></i> Has passport
                    </li>
                @endif
                @if(collect($animal->attributes)->contains('children'))
                    <li>
                        <i class="fa fa-child"></i> Good with children
                    </li>
                @endif
                <li>
                    <i class="fa fa-map-marker"></i> In foster
                    in @if(!empty($animal->location->town))
                    {{  $animal->location->town . ' ' . $animal->location->county }}
                    @else
                        -
                    @endif
                </li>
                <li><span style="color:yellow; font-size:10px">{{$animal->status->name}}</span></li>
            </ul>
            <div class="adopt-a-pet mt-5">
                <a class="btn" style="color: #04BDFF"
                   href="{{ route('pet.show',['name' => $animal->slug, 'animal' => $animal]) }}">More
                    Details</a>
            </div>
        </div>
    </div>
</div>
