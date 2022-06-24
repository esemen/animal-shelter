<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Many Tears Animal Rescue') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon"/>
    <!-- Stylesheets-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <!-- Style Stack -->
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}"/>

    @livewireStyles
    <script src="//kit.fontawesome.com/d8569e3680.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js')}}"></script>
    @stack('headScripts')
</head>

<body>
<div id="app">
    <div class="page">
        <div class="page-loader">
            <div class="brand-name"><img src="{{ asset('images/loader.png')}}" alt="" width="176" height="169"/>
            </div>
            <div class="page-loader-body">
                <div class="cssload-jumping">
                    <span></span><span></span><span></span><span></span><span></span>
                </div>
            </div>
        </div>
        <!-- Page Header-->
        <header class="page-header">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav
                    class="rd-navbar rd-navbar-top-panel-light"
                    data-layout="rd-navbar-fixed"
                    data-sm-layout="rd-navbar-fixed"
                    data-sm-device-layout="rd-navbar-fixed"
                    data-md-layout="rd-navbar-fullwidth"
                    data-md-device-layout="rd-navbar-fixed"
                    data-lg-device-layout="rd-navbar-fullwidth"
                    data-lg-layout="rd-navbar-fullwidth"
                    data-stick-up-clone="true"
                    data-md-stick-up-offset="90px"
                    data-lg-stick-up-offset="90px"
                >
                    <div class="rd-navbar-inner">
                        <!-- RD Navbar Nav-->
                        <div class="rd-navbar-nav-wrap">
                            <ul class="rd-navbar-nav">
                                <li {{ request()->route()->getName() === 'index' ? 'class="active"' : ''}}><a href="{{route('index')}}">Home</a></li>
                                <li {{ request()->route()->getName() === 'about-us' ? 'class=active' : '' }}><a href="{{url('about-us')}}">About us</a></li>
                                <li {{ request()->route()->getName() === 'adopt-a-pet' ? 'class=active' : '' }} style="border: 3px solid #04BDFF;">
                                    <a href="{{ route('adopt-a-pet') }}">Adopt</a>
                                    <ul class="rd-navbar-dropdown tabs-nav rd-navbar-open-right" style="border: 3px solid #04BDFF;">
                                        <li>
                                            <a href="{{ route('adopt-a-pet', ['animal_type' => 'dog']) }}">Meet Our
                                                Dogs</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('adopt-a-pet', ['animal_type' => 'cat']) }}">Meet Our
                                                Cats</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('adopt-a-pet', ['animal_type' => 'other']) }}">Our Other
                                                Animals</a>
                                        </li>
                                    </ul>
                                </li>
                                <li {{ request()->route()->getName() === 'how-to-help' ? 'class="active"' : ''}}><a href="{{url('how-to-help')}}">How to help</a></li>
                                <li {{ request()->route()->getName() === 'news-and-events' ? 'class="active"' : ''}}><a href="{{url('news-and-events')}}">News &amp; Events</a></li>
                                <li {{ request()->route()->getName() === 'thanks' ? 'class="active"' : ''}}><a href="{{url('thanks')}}">Thanks &amp; Stories</a></li>
                                <li {{ request()->route()->getName() === 'contact-us' ? 'class="active"' : ''}}><a href="{{url('contact-us')}}">Contact us</a></li>
                            </ul>
                        </div>
                        <!-- RD Navbar Panel-->
                        <div class="rd-navbar-panel">
                            <button
                                class="rd-navbar-toggle"
                                data-rd-navbar-toggle=".rd-navbar-nav-wrap"
                            >
                                <span></span>
                            </button>
                            <!-- RD Navbar Brand-->
                            <div class="rd-navbar-brand">
                                <a class="brand-name" href="index">
                                    <img src="{{asset('images/mtar-logo-bg.png')}}" alt="" width="400" height="auto">
                                </a>
                            </div>
                        </div>
                        <!-- RD Navbar Top Panel-->
                        <div class="rd-navbar-top-panel">
                            <div
                                class="rd-navbar-top-panel-toggle"
                                data-rd-navbar-toggle=".rd-navbar-top-panel"
                            >
                                <span></span>
                            </div>
                            <div class="rd-navbar-top-panel-content">
                                <ul>
                                    <li style="text-align: center">
                                        @if(Route::has('login'))
                                            @auth
                                                <a href="{{url('home')}}"><i class="fa fa-user-o fa-2x"
                                                                             aria-hidden="true"></i></a><br>
                                                <a href="{{url('logout')}}">Log out</a>
                                            @else
                                                <a href="{{url('login')}}"><i class="fa fa-user-o fa-2x"
                                                                              aria-hidden="true"></i></a>
                                            @endauth
                                        @endif
                                    </li>
                                </ul>
                                <form
                                    action="https://www.paypal.com/donate"
                                    method="post"
                                    target=" new"
                                >
                                    <br />
                                    <input
                                        name="hosted_button_id"
                                        type="hidden"
                                        value="JMY9FN3RAGLV4"
                                    />
                                    <input
                                        alt="Donate with PayPal button"
                                        border="0"
                                        name="submit"
                                        class="wow pulse animated"
                                        data-wow-iteration="infinite"
                                        src="{{asset('images/donate-btn3.png')}}" width="90"
                                        style="visibility: visible; animation-iteration-count: infinite; animation-name: pulse;"
                                        title="PayPal - The safer, easier way to pay online!"
                                        type="image"
                                    />
                                </form>
                                <a class="donate_btn donate" href="shop">Our Shop</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <x-page-footer/>

</div>
<!-- Javascript Stack-->
<script src="//code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="{{asset('js/core.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
@yield('pagespecificscripts')
@livewireScripts
@stack('scripts')
</body>
</html>
