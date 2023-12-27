<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $profile->name }}</title>
    <link rel="shortcut icon" sizes="114x114" href="{{ url($profile->photo) }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/custom.css') }}">
    <style>
        .navbar-light .navbar-nav .nav-link {
            font-size: 1.05rem;
        }
        html body{
            font-family: "Hanuman" !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light bg-gray navbar-white">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="{{ asset($profile->photo) }}" alt="AdminLTE Logo" class="img-circle img-size-64"
                        style="opacity: .8">
                    <span
                        class="brand-text font-weight-light font-bold text-white"><strong>{{ $profile->name }}</strong></span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse order-3 collapse" id="navbarCollapse" style="">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index3.html" class="nav-link text-white">{{__('app.home_page')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">{{__('app.decor_product_page')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">{{__('app.furniture_page')}}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle text-white">{{__('app.our_service_page')}}</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item">{{__('app.decor_service_page')}}</a></li>
                                <li><a href="#" class="dropdown-item">{{__('app.modular_kitchen_page')}}</a></li>
                                <li><a href="#" class="dropdown-item">{{__('app.bedroom_page')}}</a></li>
                                <li><a href="#" class="dropdown-item">{{__('app.living_room_page')}}</a></li>
                                <li><a href="#" class="dropdown-item">{{__('app.bathroom_page')}}</a></li>
                                <li><a href="#" class="dropdown-item">{{__('app.home_office_page')}}</a></li>
                                <li><a href="#" class="dropdown-item">{{__('app.office_page')}}</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle text-white">{{__('app.our_project_page')}}</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item">{{__('app.photo_galleries_page')}}</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/about-us') }}"
                                class="nav-link text-white">{{ __('app.about_us_page') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle text-white">{{__('app.contact_us_page')}}</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="{{ url('/contact-us') }}" class="dropdown-item">{{__('app.visit_us_page')}}</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" class="nav-link dropdown-toggle text-white"><img
                                src="{{ asset(app()->getLocale() == 'en' ? '/images/en_flag.png' : '/images/km_flag.png') }}"
                                class="img-size-32 mr-3" alt="language"></a>
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                    <li><a href="{{ route('lang.switch', 'km') }}" class=" dropdown-item">
                                            <img src="{{ asset('/images/km_flag.png') }}"
                                                class="img-size-32 mr-3" alt="language">
                                                {{__('app.khmer')}}
                                        </a>
                                    </li>
                                    <li><a href="{{ route('lang.switch', 'en') }}" class="dropdown-item">
                                            <img src="{{ asset('/images/en_flag.png') }}"
                                                class="img-size-32 mr-3" alt="language">
                                                {{__('app.english')}}
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        @endforeach
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item ml-2">
                            <a class="btn  btn-outline-primary" href="{{ route('register') }}" role="button">
                                <i class="fas fa-sign-out-alt"></i> Register
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

        <div class="content-wrapper">
            <div class="content-header bg-gray">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-lg-8 col-sm-10 offset-sm-1 offset-lg-2">
                            <h1 class="m-0 mb-4 text-center"> {{ __('app.label_welcome_to') }}
                                {{ config('app.name', 'STR Funiture') }}</h1>
                            <form action="{{ url('search') }}" method="GET">
                                <div class="input-group">
                                    <input type="search" name="q" value="{{ request()->get('q') }}"
                                        class="form-control"
                                        placeholder="{{ __('app.label_type_your_keyword_here') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container mt-4 mb-4">

            </div>


            @yield('content')
        </div>
        <footer class="main-footer bg-gray">
            @include('frontend.footer')
        </footer>
    </div>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    @yield('js')
</body>

</html>
