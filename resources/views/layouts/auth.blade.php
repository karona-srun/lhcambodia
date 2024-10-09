<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $profile->name }} | @yield('title-page')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>

<body class="hold-transition {{ Request::path() == 'attendances/scan/qrcode' ? 'lockscreen bg-white' : '' }}">
    @if (Request::path() == 'attendances/scan/qrcode')
        @yield('content')
    @else
        @if (Request::is('password*'))
            <a href="{{ url('/login') }}" class="btn btn-link"> <i class="fas fa-arrow-alt-circle-left"></i>
                {{ __('app.btn_back') }}</a>
        @endif
        <div class="login--box">
            <div class="row">
                <div class="col-md-6 col-sm-12 justify-content-center align-content-center">
                    <img src="{{ asset('images/undraw_remotely_2j6y.svg') }}" width="60%" alt=""
                        srcset="">
                </div>
                <div class="col-md-6 col-sm-12 justify-content-center align-content-center">
                    @yield('content')
                </div>
            </div>
        </div>
    @endif
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>


    <script type="text/javascript">
        $(function() {
            $('.select2').select2({
                theme: 'bootstrap4'
            });
            $('.select2s').select2({
                theme: 'bootstrap4',
                minimumResultsForSearch: Infinity,
            });
        });
    </script>
</body>

</html>
