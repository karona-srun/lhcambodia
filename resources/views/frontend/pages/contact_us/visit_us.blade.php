@extends('layouts.frontend')

@section('content')
    <div class="content">
        <div class="container">
            <div class="content-header">
                <div class="row">
                    <div class="col-sm-12 clear-pl">
                        <h1 class="m-0">{{ __('app.contact_us_page') }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"
                                    class="text-muted">{{ __('app.home_page') }}</a>
                            </li>
                            @foreach ($data as $key => $item)
                                @if ($loop->last)
                                    <li class="breadcrumb-item"><a href="{{ url($key) }}">{!! $item !!}</a>
                                    </li>
                                @else
                                    <li class="breadcrumb-item"><a href="{{ url($key) }}">{{ $item }}</a></li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container mt-4 pb-5">
            <div class="row bg-white p-4">
                <div class="col-sm-6">
                    <h5>{{ __('app.label_company_information') }}</h5>
                    <hr>
                    <div class="">
                        <h5>{{ $profile->name }}</h5>
                        <p>{{ __('app.label_sub_company_information') }}</p>
                        <div class=" row">
                            <div class="col-md-5 col-sm-12 text-center d-flex align-items-center justify-content-center">
                                <div class="">
                                    <img src="{{ asset($profile->photo) }}" alt="Logo" class="img-fluid"
                                        style="opacity: .8;width: 50%;border-radius: 3px;">
                                    <h1 class=" text-center"><strong>{{ $profile->name }}</strong></h1>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 p-5">
                                <div class="form-group">
                                    <h5><i class="fas fa-map-pin mr-2"></i> <strong>{{ __('app.label_address') }}</strong>
                                    </h5>
                                    <p class="text-break">{{ $profile->address }}</p>
                                </div>
                                <div class="form-group">
                                    <h5><i class="fas fa-phone-volume mr-2"></i> <strong>{{ __('app.phone') }}</strong>
                                    </h5>
                                    <p>{{ $profile->tel }}</p>
                                </div>
                                <div class="form-group">
                                    <h5><i class="fas fa-envelope-open-text mr-2"></i>
                                        <strong>{{ __('app.email') }}</strong>
                                    </h5>
                                    <p>{{ $profile->email }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h5>{{ __('app.contact_us_page') }}</h5>
                    <hr>
                    <div class="">
                        @if (Session::has('success'))
                            <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                                <div class="toast bg-primary fade show" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                        <strong class="mr-auto">{{ __('app.label_confirm') }}</strong>
                                    </div>
                                    <div class="toast-body">{{ Session::get('success') }}</div>
                                </div>
                            </div>
                        @endif

                        <form class="form-horizontal" method="post" action="{{ url('contact-us') }}">
                            @csrf
                            <div class="">
                                <div class="row">
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>{{__('app.label_fullname')}}</label>
                                            <input type="text" name="fullname" class="form-control">
                                            @if ($errors->has('fullname'))
                                            <div class="error text-danger text-sm mt-1">
                                                {{ $errors->first('fullname') }}</div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{__('app.label_email')}}</label>
                                            <input type="email" name="email" class="form-control">
                                            @if ($errors->has('email'))
                                            <div class="error text-danger text-sm mt-1">
                                                {{ $errors->first('email') }}</div>
                                        @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>{{__('app.label_phone')}}</label>
                                            <input type="text" class="form-control" name="phone">
                                            @if ($errors->has('phone'))
                                            <div class="error text-danger text-sm mt-1">
                                                {{ $errors->first('phone') }}</div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ __('app.label_you_are')}}</label>
                                            <select name="you_are" id="" class="form-control select2s">
                                                <option value="1">{{__('app.label_guests')}}</option>
                                                <option value="2">{{__('app.label_agency')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <label>{{__('app.content_page')}}</label>
                                            <textarea class="form-control" name="content" rows="6"></textarea>
                                            @if ($errors->has('content'))
                                            <div class="error text-danger text-sm mt-1">
                                                {{ $errors->first('content') }}</div>
                                        @endif
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"> <i class="fas fa-paper-plane me-3"></i>
                                    {{ __('app.btn_send') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-sm-12 clear-pl mt-4 m-2">
                    <h5 class="m-0 mb-2">{{ __('app.visit_us_page') }}</h5>
                    <div class="border p-1">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.090750245001!2d104.88372059999999!3d11.5453476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109510069a6b291%3A0xae330c7e42d0b3c0!2sLuxury%20Home!5e0!3m2!1skm!2skh!4v1705121194177!5m2!1skm!2skh" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
