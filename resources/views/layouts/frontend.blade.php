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
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/custom.css') }}">
    <style>
        .navbar-light .navbar-nav .nav-link {
            font-size: 1.05rem;
            color: #343434 !important;
        }

        html body {
            font-family: "Hanuman" !important;
        }

        .nav-link:hover .dropdown-menu {
            display: block;
        }

        .navbar-light .navbar-toggler {
            color: rgba(0, 0, 0, .5);
            border-color: transparent !important;
        }

        .content-wrapper>.content {
            padding: 0px !important;
        }

        .container-fluid-cus {
            padding: 0px !important;
        }

        .content-header-cus {
            padding: 0px !important;
        }

        .carousel-item img {
            height: 350px !important;
        }

        .iframe-video:hover {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }

        .nav-item {
            border-bottom: 1.5px solid transparent;
        }

        .nav-item:hover {
            border-bottom: 1.5px solid #f58f5a;
        }

        .nav-item-cus:hover {
            border-bottom: 1.5px solid transparent !important;
        }

        .navbar-cus {
            padding: 0px !important;
        }

        .dropdown-header {
            text-align: left !important;
            color: #f58f5a;
        }

        .clear-pl {
            padding-left: 0px !important;
        }

        .clear-pr {
            padding-right: 0px !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper bg-white">
        <div class="container">
            <header class=" py-1 pt-2">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-sm-12 col-xl-4 col-md-4">
                        <a class="btn btn-icon btn-outline-link" href="{{ 'tel:' . $profile->tel }}"> <i
                                class="fas fa-mobile-alt"></i> {{ $profile->tel }}</a>
                        <a class="btn btn-icon btn-outline-link" href="{{ 'mailto:' . $profile->email }}"> <i
                                class="far fa-envelope"></i> {{ $profile->email }}</a>
                    </div>
                    <div class="col-sm-12 col-xl-4 col-md-4 text-center">
                        <a class="blog-header-logo text-dark" href="#">
                            <img src="{{ asset($profile->photo) }}" alt="Logo" class="img-circle img-size-50"
                                style="opacity: .8">
                            <span
                                class="brand-text font-weight-light font-bold "><strong>{{ $profile->name }}</strong></span>
                        </a>
                    </div>
                    <div class="col-sm-12 col-xl-4 col-md-4 d-flex justify-content-end align-items-center">
                        <a class="btn btn-icon btn-outline-link" href="{{ url('/admin/login') }}"> <i
                                class="fas fa-sign-in-alt me-2"></i> {{ __('app.label_login') }}</a>
                        <div class="dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle "><img
                                    src="{{ asset(app()->getLocale() == 'en' ? '/images/en_flag.png' : '/images/km_flag.png') }}"
                                    class="img-size-32 mr-3" alt="language"></a>
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                        <li><a href="{{ route('lang.switch', 'km') }}" class=" dropdown-item">
                                                <img src="{{ asset('/images/km_flag.png') }}" class="img-size-32 mr-3"
                                                    alt="language">
                                                {{ __('app.khmer') }}
                                            </a>
                                        </li>
                                        <li><a href="{{ route('lang.switch', 'en') }}" class="dropdown-item">
                                                <img src="{{ asset('/images/en_flag.png') }}" class="img-size-32 mr-3"
                                                    alt="language">
                                                {{ __('app.english') }}
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </header>
        </div>

        <div class="content-wrapper pb-4">
            <div class="content-header content-header-cus bg-white">
                <div class="container">
                    {{-- <div class="row">
                        <div class="col-sm-12"> --}}
                    <nav class="navbar navbar-cus navbar-expand-lg navbar-light  navbar-white rounded">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon me-3"></span> {{ __('app.menu') }}
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{ url('/') }}" class="nav-link">{{ __('app.home_page') }}</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <div class="row">
                                        <div class="col-sm-6">

                                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"
                                                class="nav-link dropdown-toggle">{{ __('app.decor_product_page') }}</a>
                                            <ul aria-labelledby="dropdownSubMenu1"
                                                class="dropdown-menu border-0 shadow">

                                                <div class="d-md-flex align-items-start justify-content-start">

                                                    <div>
                                                        <div class="dropdown-header">
                                                            <h6 class="dropdown-title">{{ __('app.wpc_decking_page') }}
                                                            </h6>
                                                        </div>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.wpc_decking') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.wpc_decking_tile') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.wpc_skirting') }}</a>
                                                        <a class="dropdown-item" href="#">{{__('app.wpc_decking_accessories')}}</a>
                                                    </div>

                                                    <div>
                                                        <div class="dropdown-header">
                                                            <h6 class="dropdown-title">{{ __('app.wall_panel_page') }}
                                                            </h6>
                                                        </div>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.wpc_wall_cladding') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.wpc_wall_panel') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.pvc_wall_column') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.pvc_wall_panel') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.pvc_skirting') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.wall_panel_accessories')}}</a>
                                                    </div>

                                                    <div>
                                                        <div class="dropdown-header">
                                                            <h6 class="dropdown-title">{{ __('app.flooring_page') }}
                                                            </h6>
                                                        </div>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.laminate_floor') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.spc_floor') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.lvt_floor') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.dry_back_lvt_floor') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.glue_dry_back_lvt_floor_2mm') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.vinyl_floor') }}</a>
                                                            <a class="dropdown-item" href="#">{{__('app.skirting_floor')}}</a>
                                                    </div>

                                                    <div>
                                                        <div class="dropdown-header">
                                                            <h6 class="dropdown-title">{{ __('app.carpet') }}</h6>
                                                        </div>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.carpet_roll') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.carpet_tile') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.rug') }}</a>
                                                    </div>

                                                    <div>
                                                        <div class="dropdown-header">
                                                            <h6 class="dropdown-title">{{ __('app.wallpaper') }}</h6>
                                                        </div>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.wallpaper_roll') }}</a>
                                                        <a class="dropdown-item"
                                                            href="#">{{ __('app.wallpaper_3d') }}</a>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">{{ __('app.furniture_page') }}</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"
                                        class="nav-link dropdown-toggle">{{ __('app.our_service_page') }}</a>
                                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                        <li><a href="#"
                                                class="dropdown-item">{{ __('app.decor_service_page') }}</a>
                                        </li>
                                        <li><a href="#"
                                                class="dropdown-item">{{ __('app.modular_kitchen_page') }}</a>
                                        </li>
                                        <li><a href="#" class="dropdown-item">{{ __('app.bedroom_page') }}</a>
                                        </li>
                                        <li><a href="#"
                                                class="dropdown-item">{{ __('app.living_room_page') }}</a>
                                        </li>
                                        <li><a href="#" class="dropdown-item">{{ __('app.bathroom_page') }}</a>
                                        </li>
                                        <li><a href="#"
                                                class="dropdown-item">{{ __('app.home_office_page') }}</a>
                                        </li>
                                        <li><a href="#" class="dropdown-item">{{ __('app.office_page') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"
                                        class="nav-link dropdown-toggle">{{ __('app.our_project_page') }}</a>
                                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                        <li><a href="#"
                                                class="dropdown-item">{{ __('app.photo_galleries_page') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/faq') }}" class="nav-link">{{ __('app.faq_page') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/about-us') }}"
                                        class="nav-link">{{ __('app.about_us_page') }}</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"
                                        class="nav-link dropdown-toggle">{{ __('app.contact_us_page') }}</a>
                                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                        <li><a href="{{ url('/contact-us') }}"
                                                class="dropdown-item">{{ __('app.visit_us_page') }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    {{-- </div>
                    </div> --}}
                </div>
            </div>
            @yield('content')
        </div>
        <footer class="main-footer bg-gray">
            @include('frontend.footer')
        </footer>
    </div>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    @yield('js')
    <script>
        $(document).ready(function() {
            $('.dropdown').hover(function() {
                $(this).addClass('show');
                $(this).find('.dropdown-menu').addClass('show');
            }, function() {
                $(this).removeClass('show');
                $(this).find('.dropdown-menu').removeClass('show');
            });

            $('.select2').select2({
                theme: 'bootstrap4',
            });

            $('.select2s').select2({
                theme: 'bootstrap4',
                minimumResultsForSearch: Infinity,
            });
        });
    </script>
</body>

</html>
