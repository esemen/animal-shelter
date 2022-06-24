@extends('layouts.app')
@section('content')
    <section class="section py-5 bg-gray-light text-center">
        <div class="shell">
            <h2 class="wow fadeIn" data-wow-duration=".5s" data-wow-offset="50">{{session()->get('$animal->name')}}</h2>
            <div class="range">
                <div class="cell-xs-12 wow fadeIn" data-wow-duration=".8s" data-wow-offset="150">
                    <!-- Owl Carousel-->
                    <div class="owl-carousel-centered">
                        <div class="owl-carousel" data-items="1" data-sm-items="3" data-stage-padding="0"
                             data-loop="true" data-margin="10" data-lg-margin="30" data-mouse-drag="false"
                             data-center="true" data-numbering="#owl-numbering-1" data-nav="true">
                            @if(!empty($animal->images))
                            @foreach($animal->images as $image)
                                <div class="item">
                                    <img
                                        src="{{ asset('storage/' . config('mtar.animal_image_path')  . '/' .  $image) }}"
                                        alt="{{ $animal->name }}" width="346" height="249"/>
                                </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="owl-numbering owl-numbering-default" id="owl-numbering-1">
                            <div class="numbering-current"></div>
                            <div class="numbering-separator"></div>
                            <div class="numbering-count"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white text-center">
        <div class="shell">
            <div class="range range-sm-center">
                <div class="cell">
                    <div class="flex-row mb-3">
                        <h2>
                            {{ $animal->name }}
                        </h2>
                        <h4 class="mt-0">
                            {{ $animal->breed }} &bull; {{ $animal->sex }} &bull;
                            {{ $animal->ageText }} &bull; Id: {{ $animal->legacy_id }}
{{--                            &bull; Location: @if(isset($animal->location->town))--}}
{{--                                 {{ $animal->location->town }}--}}
{{--                            @endif--}}
                        </h4>
                    </div>
                    <!-- Box profile-->
                    <article class="box-profile">
                        <div class="flex-row">
                            <div class="col-md-3">
                                <p class="box-profile-description mb-3"><i class="fa fa-file-archive-o"></i> {{ $animal->status->name }}</p>
                                <p class="box-profile-description mb-3"><i class="fa fa-map-marker"></i>
                                @if(isset($animal->location->town))
                                     {{ $animal->location->town . ' ' . $animal->location->county}}
                                @endif
                                </p>
                                @if(collect($animal->attributes)->contains('show_passport'))
                                    <p class="box-profile-description mb-3"><i class="fa fa-certificate"></i> Has passport</p>
                                @endif
                            </div>
                            <div class="{{ $lastVisitedAnimals->count() ? 'col-md-6' : 'col-md-9' }}">
                                <div class="box-profile-text">
                                    {!! $animal -> shortdescription !!}
                                    <hr>
                                    {!! $animal -> description !!}
{{--                                    <p class="box-profile-title">ADOPTION DETAILS</p>--}}
{{--                                    <p>--}}
{{--                                        If your application is successful you will be home checked and you, all members--}}
{{--                                        of your family and any dog(s) who will be living with the dog MUST come to meet--}}
{{--                                        the dog you want to adopt. All our dogs are micro-chipped, have had at least--}}
{{--                                        their first inoculation* and are spayed/neutered unless there is a medical--}}
{{--                                        reason for not doing so. You must have a safe means of transporting the dog home--}}
{{--                                        in a crate or if this is not possible please discuss with Many Tears or the--}}
{{--                                        Fosterer when your application is being processed.--}}
{{--                                        <br><br>--}}
{{--                                        * Many Tears uses Vanguard to vaccinate their dogs. However, this can sometimes--}}
{{--                                        be difficult to source at local vets so if you are adopting a dog or puppy that--}}
{{--                                        has only had one vaccination please be aware your vets may require you to start--}}
{{--                                        the course from the beginning.--}}
{{--                                        <br><br>--}}
{{--                                        Please read our adoption procedures before applying and then complete the--}}
{{--                                        adoption form.</p>--}}
{{--                                    <p class="box-profile-title">Information for Adopters</p>--}}
{{--                                    <p>All dogs have been vet-checked, spayed/neutered, and are up-to-date on--}}
{{--                                        vaccinations. Adoption fee includes carrier, scratching pad, starter pack of--}}
{{--                                        food and litter, and toy. We prefer kittens be adopted in pairs. We offer free--}}
{{--                                        advice anytime about your adopted cat. If, for any reason, it doesn't work out,--}}
{{--                                        we will take the cat back, anytime in the future. Potential adopters must be--}}
{{--                                        interviewed in person, at the shelter, and live within 150 miles of Animal--}}
{{--                                        Shelter.</p>--}}
                                </div>
                            </div>
                            @if ($lastVisitedAnimals->count())
                                <div class="col-md-3">
                                    <h6>Last Visited</h6>
                                    <ul>
                                        @foreach($lastVisitedAnimals as $visited)
                                            <li>
                                                <a style=""
                                                   href="{{ route('pet.show',['name' => $visited->name, 'animal' => $visited]) }}">
                                                   {{ $visited->name }}</a>


{{--                                                <a href="{{ route('pet.show',['name' => $visited->name, 'animal' => $visited]) }}>--}}
{{--                                                {{$visited->name}}--}}
{{--                                                    </a>--}}
                                                    </li>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </article>
                    <div class="mt-5">
                        <a class="adopt_btn adopt" href="{{ route('application.create',['animal' => $animal]) }}">
                            APPLY TO ADOPT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style type="text/css">
        .owl-stage {
            display: flex;
            align-items: center;
        }
    </style>
@endpush
