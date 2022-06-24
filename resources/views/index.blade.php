@extends('layouts.app')
@section('content')
    <section>
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide show-neighbors" data-ride="carousel">

                <ol class="carousel-indicators">
                    <li data-target="" data-slide-to="0" class="active"></li>
                    <li data-target="" data-slide-to="1"></li>
                    <li data-target="" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="item__third">
                            <img src="{{asset('images/DSCF9847-3.jpg')}}" class="d-block w-100" alt="">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="item__third">
                            <img src="{{asset('images/DSCF9473-3.jpg')}}" class="d-block w-100" alt="">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="item__third">
                            <img src="{{asset('images/DSCF4080-3.jpg')}}" class="d-block w-100" alt="">
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </section>


    <!-- Thumbnails-->
    <section class="section-md adopt-md bg-white">
        <div class="shell shell-wide">
            <div class="range spacing-30">
                <div class="cell-sm-6 cell-lg-4">
                    <!-- Thumbnail ruby--><a
                        class="thumbnail-steve thumbnail-steve-responsive"
                        href="{{ route('adopt-a-pet', ['animal_type' => 'dog']) }}"
                    >
                        <figure class="thumbnail-steve-image">
                            <img
                                src="{{asset('images/DSCF9505-2.jpg')}}"
                                alt=""
                                width="422"
                                height="260"
                            />
                        </figure>
                        <div class="thumbnail-steve-caption">
                            <p class="thumbnail-steve-title">Dogs</p>
                        </div></a
                    >
                </div>
                <div class="cell-sm-6 cell-lg-4">
                    <!-- Thumbnail steve--><a
                        class="thumbnail-steve thumbnail-steve-responsive"
                        href="{{ route('adopt-a-pet', ['animal_type' => 'cat']) }}"
                    >
                        <figure class="thumbnail-steve-image">
                            <img
                                src="{{asset('images/cats-2.jpg')}}"
                                alt=""
                                width="422"
                                height="260"
                            />
                        </figure>
                        <div class="thumbnail-steve-caption">
                            <p class="thumbnail-steve-title">Cats</p>
                        </div></a
                    >
                </div>
                <div class="cell-sm-6 cell-lg-4">
                    <!-- Thumbnail steve--><a
                        class="thumbnail-steve thumbnail-steve-responsive"
                        href="{{ route('adopt-a-pet', ['animal_type' => 'other']) }}"
                    >
                        <figure class="thumbnail-steve-image">
                            <img
                                src="{{asset('images/OtherAnimals.jpg')}}"
                                alt=""
                                width="422"
                                height="260"
                            />
                        </figure>
                        <div class="thumbnail-steve-caption">
                            <p class="thumbnail-steve-title">Other</p>
                        </div></a
                    >
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white text-center" data-on="false" data-md-on="true">
        <div class="rd-parallax-layer" data-speed="0.5" data-type="media"></div>
        <div class="rd-parallax-layer" data-speed="0" data-type="html">
            <div class="section-md special-md">
                <div class="shell special-home">
                    <div class="special-home-img">
                        <img
                            src="{{asset('images/SpecialHomes1.jpg')}}"
                            alt=""
                            width="400"
                            height="auto"
                        />
                    </div>
                    <!-- Owl Carousel-->
                    <div class="owl-style-1 special-owl-style">
                        <div
                            class="owl-carousel"
                            data-items="2"
                            data-stage-padding="15"
                            data-loop="true"
                            data-margin="30"
                            data-mouse-drag="false"
                            data-nav="true"
                            data-dots="true"
                            data-animation-in="fadeIn"
                            data-animation-out="fadeOut"
                        >
                            <div class="item">
                                <!-- Quote circle-->
                                <blockquote class="quote-circle">
                                    <div class="unit unit-xs-horizontal">
                                        <div class="unit-left">
                                            <div>
                                                <img
                                                    src="{{asset('images/home1-6-280x320.jpg')}}"
                                                    alt=""
                                                    width="280"
                                                    height="320"
                                                />
                                            </div>
                                        </div>
                                        <div class="unit-body">
                                            <div class="quote-circle-body">
                                                <div class="quote-circle-header">
                                                    <cite>Daisy</cite>
                                                </div>
                                                <p class="quote-circle-text">
                                                    <q
                                                    >Daisy is a wonderful ex breeding Labrador but
                                                        sadly she is almost completely blind due to
                                                        having mature cataracts, the most she sees is
                                                        probably just light and dark. She also has
                                                        several broken teeth. Daisy will see a
                                                        specialist to see if anything can be done for
                                                        her.</q
                                                    >
                                                </p>
                                                <div class="quote-circle-meta">
                                                    <ul class="quote-circle-meta-list">
                                                        <li class="object-inline">
                                  <span
                                      class="icon icon-sm icon-primary-filled icon-circle fa fa-venus"
                                  ></span
                                  ><span>Female</span>
                                                        </li>
                                                        <li class="object-inline">
                                  <span
                                      class="icon icon-sm icon-primary-filled icon-circle fa-calendar"
                                  ></span
                                  ><span>8 years old</span>
                                                        </li>
                                                        <li class="object-inline">
                                  <span
                                      class="icon icon-sm icon-primary-filled icon-circle fa-map-marker"
                                  ></span
                                  ><span>Calne</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <div class="item">
                                <!-- Quote circle-->
                                <blockquote class="quote-circle">
                                    <div class="unit unit-xs-horizontal">
                                        <div class="unit-left">
                                            <div>
                                                <img
                                                    src="{{asset('images/home1-7-280x320.jpg')}}"
                                                    alt=""
                                                    width="280"
                                                    height="320"
                                                />
                                            </div>
                                        </div>
                                        <div class="unit-body">
                                            <div class="quote-circle-body">
                                                <div class="quote-circle-header">
                                                    <cite>Coll</cite>
                                                </div>
                                                <p class="quote-circle-text">
                                                    <q
                                                    >Coll has been returned from a home after an
                                                        incident in his new home. We are told Coll was
                                                        on a lead in his drive, when a neighbour came
                                                        over to stroke him. A cyclist went past and
                                                        surprised him and Coll panicked and snapped at
                                                        the man causing a tear in his trousers.</q
                                                    >
                                                </p>
                                                <div class="quote-circle-meta">
                                                    <ul class="quote-circle-meta-list">
                                                        <li class="object-inline">
                                  <span
                                      class="icon icon-sm icon-primary-filled icon-circle fa fa-mars"
                                  ></span
                                  ><span>Male</span>
                                                        </li>
                                                        <li class="object-inline">
                                  <span
                                      class="icon icon-sm icon-primary-filled icon-circle fa-calendar"
                                  ></span
                                  ><span>4 years old</span>
                                                        </li>
                                                        <li class="object-inline">
                                  <span
                                      class="icon icon-sm icon-primary-filled icon-circle fa-map-marker"
                                  ></span
                                  ><span>Llanelli</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <div class="item">
                                <!-- Quote circle-->
                                <blockquote class="quote-circle">
                                    <div class="unit unit-xs-horizontal">
                                        <div class="unit-left">
                                            <div>
                                                <img
                                                    src="{{asset('images/home1-8-280x320.jpg')}}"
                                                    alt=""
                                                    width="280"
                                                    height="320"
                                                />
                                            </div>
                                        </div>
                                        <div class="unit-body">
                                            <div class="quote-circle-body">
                                                <div class="quote-circle-header">
                                                    <cite>Freddie</cite>
                                                </div>
                                                <p class="quote-circle-text">
                                                    <q>
                                                        Freddie, he is nearly 3 yrs old and was rehomed
                                                        almost two years ago now to a lady who is unable
                                                        to keep him due to her change in circumstances.
                                                        Freddie is a confused boy and has gone straight
                                                        to his previous fosterer who has been working
                                                        hard to resettle him and reassure him.</q
                                                    >
                                                </p>
                                                <div class="quote-circle-meta">
                                                    <ul class="quote-circle-meta-list">
                                                        <li class="object-inline">
                                  <span
                                      class="icon icon-sm icon-primary-filled icon-circle fa fa-mars"
                                  ></span
                                  ><span>Male</span>
                                                        </li>
                                                        <li class="object-inline">
                                  <span
                                      class="icon icon-sm icon-primary-filled icon-circle fa-calendar"
                                  ></span
                                  ><span>4 years old</span>
                                                        </li>
                                                        <li class="object-inline">
                                  <span
                                      class="icon icon-sm icon-primary-filled icon-circle fa-map-marker"
                                  ></span
                                  ><span>Lampeter</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us-->
    <section class="text-center">
        <div class="shell shell-fluid shell-condensed bg-gray-light">
            <div class="range range-condensed">
                <div class="cell-lg-6 height-fill">
                    <div class="range">
                        <div class="cell-xs-12">
                            <div class="box-spacer-about-us">
                                <h2>About Us</h2>
                                <!-- Bootstrap tabs-->
                                <div
                                    class="tabs-custom tabs-horizontal tabs-line tabs-line-blue-hide tabs-centered"
                                    id="tabs-1"
                                >
                                    <!-- Nav tabs-->
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tabs-1-1" data-toggle="tab">Our History And Mission</a>
                                        </li>
                                        <li>
                                            <a href="{{url('contact-us')}}" >Contact Us And Visiting Times</a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes-->
                                    <div class="tab-content tabs-centered">
                                        <div class="tab-pane fade in active" id="tabs-1-1">
                                            <p>
                                                Many Tears Animal Rescue was opened in 2004 and is based in carmarthenshire, Wales. We mainly home dogs but also occasionally have cats and other animals. As well as homing dogs from the rescuewe have dogs in foster homes throughout the UK. Our mission is to offer a safe haven to any dog in need of help and a safe place to stay no matter where it has come from.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <a
                                    class="btn btn-primary btn-effect-anis"
                                    href="{{url('about-us')}}"
                                >read more</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell-lg-6 height-fill">
                    <div class="thumbnail-video">
                        <img src="{{asset('images/DSCF9641-new.jpg')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-decoration-wrap">
        <div class="shell">
            <div class="range range-sm-center">
                <div class="cell-md-6 cell-lg-5">
                    <div class="section-decoration-image"><img src="{{asset('images/Horses3.png')}}" alt="" width="922" height="657">
                    </div>
                </div>
                <div class="cell-sm-9 cell-md-6 cell-lg-7">
                    <div class="section-decoration-content">
                        <div class="section-sm">
                            <h2>Our Equestrian Centre</h2>
                            <!-- Bootstrap tabs-->
                            <div class="tabs-custom tabs-horizontal tabs-line tabs-left" id="tabs-2">
                                <!-- Nav tabs-->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tabs-2-1" data-toggle="tab">our mission</a></li>
                                </ul>
                                <!-- Tab panes-->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tabs-2-1">
                                        <p>After years of admiration and a love of horses Sylvia wanted to do something to help the plight of unwanted and mistreated equines as well as educate children about caring for them.  In addition to this we also have our Only Friends and Horses Group for adults who are struggling or feeling lonely. Here you can meet like-minded people in a supportive environment to spend some time with horses, grooming horses, walking ponies, learning about horses and care, getting some fresh air and a well needed break from real life.</p>
                                    </div>
                                </div>
                            </div><a class="btn btn-primary btn-effect-anis" href="{{ url('enquine-centre') }}">Find Out More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- recent news-->
    <section class="section-md bg-white text-center">
        <div class="shell shell-wide">
            <div class="range spacing-30">
                <div class="cell-xs-12">
                    <h2>Latest News & Events</h2>
                </div>
                <div class="cell-xs-12">
                    <!-- Owl Carousel-->
                    <div class="owl-style-tiny">
                        <div
                            class="owl-carousel"
                            data-items="1"
                            data-sm-items="2"
                            data-xl-items="3"
                            data-nav="true"
                            data-dots="true"
                            data-stage-padding="0"
                            data-loop="true"
                            data-margin="30"
                            data-md-margin="15"
                            data-mouse-drag="false"
                        >
                            <div class="item">
                                <!-- Post-minimal-->
                                <article class="post-news">
                                    <div class="post-news-image">
                                        <img
                                            src="images/home2-6-568x268.jpg"
                                            alt=""
                                            width="568"
                                            height="268"
                                        />
                                    </div>
                                    <div class="post-news-body">
                                        <div class="unit unit-horizontal">
                                            <div class="unit-left">
                                                <time class="post-news-time" datetime="2016-01-01"
                                                ><span class="big">25</span
                                                    ><span class="small">April</span></time
                                                >
                                            </div>
                                            <div class="unit-body">
                                                <p class="post-news-title">
                                                    <a href="single-post.html"
                                                    >Wellness Care Plans for Your Pets</a
                                                    >
                                                </p>
                                                <div class="post-news-text">
                                                    <p>
                                                        Have you ever considered enrolling your pet in a
                                                        wellness care plan? These plans are quickly
                                                        gaining popularity, and with good reason...
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="item">
                                <!-- Post-minimal-->
                                <article class="post-news">
                                    <div class="post-news-image">
                                        <img
                                            src="images/home2-7-568x268.jpg"
                                            alt=""
                                            width="568"
                                            height="268"
                                        />
                                    </div>
                                    <div class="post-news-body">
                                        <div class="unit unit-horizontal">
                                            <div class="unit-left">
                                                <time class="post-news-time" datetime="2016-01-01"
                                                ><span class="big">09</span
                                                    ><span class="small">may</span></time
                                                >
                                            </div>
                                            <div class="unit-body">
                                                <p class="post-news-title">
                                                    <a href="single-post.html"
                                                    >Top 5 Most Affectionate Cats</a
                                                    >
                                                </p>
                                                <div class="post-news-text">
                                                    <p>
                                                        Contrary to popular belief, not all cats are the
                                                        epitome of indifference. Some cat breeds are
                                                        among the most affectionate and loving pets...
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="item">
                                <!-- Post-minimal-->
                                <article class="post-news">
                                    <div class="post-news-image">
                                        <img
                                            src="images/home2-6-568x268.jpg"
                                            alt=""
                                            width="568"
                                            height="268"
                                        />
                                    </div>
                                    <div class="post-news-body">
                                        <div class="unit unit-horizontal">
                                            <div class="unit-left">
                                                <time class="post-news-time" datetime="2016-01-01"
                                                ><span class="big">25</span
                                                    ><span class="small">April</span></time
                                                >
                                            </div>
                                            <div class="unit-body">
                                                <p class="post-news-title">
                                                    <a href="single-post.html"
                                                    >Wellness Care Plans for Your Pets</a
                                                    >
                                                </p>
                                                <div class="post-news-text">
                                                    <p>
                                                        Have you ever considered enrolling your pet in a
                                                        wellness care plan? These plans are quickly
                                                        gaining popularity, and with good reason...
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
