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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}"/>

    @stack('styles')

    <script
        src="//maps.googleapis.com/maps/api/js?key=AIzaSyAWhqhiJDIHFhYZ9TCQbNky-WQUi3PCRbM&libraries=places"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('js/ckeditor/config.js')}}"></script>

</head>

<body>
<div id="app">
    <div class="page">
        <div class="page-loader">
            <div class="brand-name"><img src="{{ asset('images/loader.png')}}" alt="" width="176" height="169"/>
            </div>
            <div class="page-loader-body">
                <div class="cssload-jumping"><span></span><span></span><span></span><span></span><span></span></div>
            </div>
        </div>
        <!-- Page header-->
        <header class="page-header">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
                     data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-static"
                     data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static"
                     data-lg-layout="rd-navbar-static" data-stick-up-clone="true" data-md-stick-up-offset="190px"
                     data-lg-stick-up-offset="190px">
                    <div class="rd-navbar-top-panel">
                        <div class="rd-navbar-top-panel-toggle" data-rd-navbar-toggle=".rd-navbar-top-panel">
                            <span></span></div>
                        <div class="rd-navbar-top-panel-content">
                            <ul class="inline-list-xxs" style="color: white">
                                <li>
                                    <a class="icon icon-xxs icon-circle icon-gray-outline text-white icon-effect-1 fa fa-inbox"
                                       href="#"></a></li>
                                <li>
                                    <a class="icon icon-xxs icon-circle icon-gray-outline text-white icon-effect-1 fa fa-calendar"
                                       href="#"></a></li>
                                <li>
                                    <a class="icon icon-xxs icon-circle icon-gray-outline text-white icon-effect-1 fa fa-twitter"
                                       href="#"></a></li>
                                <li>
                                    <a class="icon icon-xxs icon-circle icon-gray-outline text-white icon-effect-1 fa fa-google-plus"
                                       href="#"></a></li>
                            </ul>
                            <div class="object-inline">
                                @if(Route::has('login'))
                                    @auth
                                        <a href="{{ route('home') }}"><span
                                                class="mr-2"> {{ auth()->user()->name }} </span><i class="fa fa-user-o"
                                                                                                   aria-hidden="true"></i><br>
                                            <!-- <span style="color:#04BDFF;text-align:center; margin: 0 auto">Profile</span> -->
                                        </a>
                                    @else
                                        <a href="{{url('login')}}"><i class="fa fa-user-o fa-2x" aria-hidden="true"></i></a>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="rd-navbar-inner">
                        <!-- RD Navbar Panel-->
                        <div class="rd-navbar-panel">
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span>
                            </button>
                            <!-- RD Navbar Brand-->
                            <div class="rd-navbar-brand"><a class="brand-name" href="{{ url('admin') }}"><img
                                        src="{{ asset('images/loader.png')}}"/></a></div>
                        </div>
                        <!-- RD Navbar Nav-->
                        <div class="rd-navbar-nav-wrap text-left">
                            <ul class="rd-navbar-nav">
                                @can('user.view')
                                    <li><a href="{{ route('users') }}">Users</a>
                                        <ul class="rd-navbar-dropdown tabs-nav">
                                            <li><a href="{{ route('users') }}">All Users</a></li>
                                            @can('users.edit')
                                                <li><a href="{{ route('users.pending') }}">Pending applications</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                                @endcan
                                @can('application.view')
                                    <li>
                                        <a href="{{ route('applications.bystatus', ['status' => 'new']) }}">Applications</a>
                                        <ul class="rd-navbar-dropdown tabs-nav">
                                            <li><a href="{{ route('applications.index') }}">All Applications</a></li>
                                            @foreach($applicationStatuses as $status)
                                                <li>
                                                    <a href="{{route('applications.bystatus', ['status' => $status])}}">{{ $status->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endcan
                                @can('animal.view')
                                    <li>
                                        <a href="{{ route('animals.bystatus', ['status' => 'pending']) }}">Animals</a>
                                        <ul class="rd-navbar-dropdown tabs-nav">
                                            <li><a href="{{ route('animals.index') }}">All</a></li>
                                            @foreach($animalStatuses as $status)
                                                <li>
                                                    <a href="{{ route('animals.bystatus', ['status' => $status]) }}">{{ $status->name }}</a>
                                                </li>
                                            @endforeach
                                            @if (false)
                                                <li><a href="{{route('animals.available') }}">Available</a>
                                                <li><a href="{{route('animals.adopted')}}">Adopted</a>
                                                </li>
                                                <li><a href="{{route('animals.pending')}}">Pending</a>
                                                <li><a href="{{route('animals.infoster')}}">In fosterer</a>
                                                <li><a href="{{route('animals.reserved')}}">Reserved</a>
                                                <li><a href="{{route('animals.passedtofoster')}}">Passed to foster</a>
                                                <li><a href="{{route('animals.lastupdated')}}">Last updated</a>
                                            @endif
                                        </ul>
                                    </li>
                                @endcan
                                @can('page.view')
                                    <li><a href="{{ route('pages.index') }}">Pages</a>
                                        <ul class="rd-navbar-dropdown tabs-nav">
                                            <li><a href="{{ route('pages.index') }}">View Pages</a></li>
                                            @can('page.edit')
                                                <li><a href="{{ route('pages.create') }}">Create Page</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                                @endcan
                                @can('vetter.view')
                                    <li><a href="{{ route('home-checks.index') }}">Vetter</a>
                                        <ul class="rd-navbar-dropdown tabs-nav">
                                            <li><a href="{{ route('home-checks.index') }}">Home Checks</a></li>
                                        </ul>
                                    </li>
                                @endcan
                            </ul>
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

<!-- Javascript-->
<!-- <script src="//code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
 <script src="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="{{asset('js/core.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

@stack('page-scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.1.2/dist/alpine.js" defer></script>
@livewireScripts
</body>
</html>
