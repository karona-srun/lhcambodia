@extends('layouts.frontend')

@section('content')
    <div class="content">
        <div class="container">
            <div class="content-header">
                <div class="row">
                    <div class="col-sm-12 clear-pl">
                        <h1 class="m-0">{{ __('app.product') }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-muted"> <i
                                        class=" fas fa-home"></i> {{ __('app.home_page') }}</a>
                            </li>
                            @foreach ($data as $key => $item)
                                @if ($loop->last)
                                    <li class="breadcrumb-item"><a href="{{ url($key) }}">{!! $item !!}</a>
                                    </li>
                                @else
                                    <li class="breadcrumb-item active"><a href="{{ url($key) }}"
                                            class=" text-muted">{{ $item }}</a></li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container mt-4 pb-5">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted mb-3">{{ __('app.product_category') }}</h5>
                            <hr>
                            <a href="{{ url('/') }}"
                                class="btn btn-block btn-light text-sm-left">{{ __('app.label_all') }}</a>
                            @foreach ($productCategory as $menu_item)
                                <a href="#" class="btn btn-block btn-light text-color-lhc text-sm-left"><i
                                        class="fas fa-angle-double-right me-3"></i>
                                    {{ app()->getLocale() == 'en' ? $menu_item->name : $menu_item->name_km }}</a>
                                @foreach ($menu_item->subCategory as $submenu)
                                    <a href="{{ url('/decor-product/' . strtolower(str_replace(' ', '-', $menu_item->name)) . '/' . strtolower(str_replace(' ', '-', $submenu->name)), $submenu->id) }}"
                                        class="btn btn-block {{ request()->id == $submenu->id ? 'btn-lhc text-white' : 'btn-light' }} text-sm-left pl-4">{{ app()->getLocale() == 'en' ? $submenu->name : $submenu->name_km }}</a>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 mt-3">
                    <h5 class="text-muted">{{ __('app.product_info') }}</h5>
                    <hr class="style4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-solid">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="col-12">
                                                <div id="img-zoomer-box">
                                                    <img src="{{ '/products/' . $product->photo }}" id="img-1"
                                                        class="product-image" alt="Zoom Image on Mouseover" />
                                                    <div id="img-2"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 product-image-thumbs">
                                                <div class="product-image-thumb"><img
                                                        src="{{ '/products/' . $product->photo }}" alt="Product Image">
                                                </div>
                                                @foreach ($attachments as $item)
                                                    <div class="product-image-thumb"><img
                                                            src="{{ url('/attachments/', $item->name) }}"
                                                            alt="Product Image"></div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <h3 class="my-3">{{ $product->product_name }}</h3>
                                            <hr>
                                            <h5 class="my-2 text-color-lhc">
                                                {{ "$" . number_format($product->salling_price, 2, '.', '.') }}</h5>
                                            <h6 class="my-1">{{ __('app.code') }}: {{ $product->product_code }}</h6>
                                            <h6 class="my-1">{{ __('app.label_color_code') }}:
                                                {{ $product->color_code }}</h6>

                                            <h5 class="mt-3">{{ __('app.label_scale') }}</h5>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-default btn-flat text-center">
                                                    <input type="radio" name="color_option" id="color_option_b1"
                                                        autocomplete="off">
                                                    <span class="text-lg">{{ $product->scale }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 mb-5">
                                        <div class="col-sm-12 p-3">
                                            <p class="style-lhc">
                                                <span
                                                    style="border: 1px solid transparent;background: #f58f5a; padding: 10px 10px 10px 10px;color: #fff;">{{ __('app.contact_us_page') }}</span>
                                            </p>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="">

                                                        @if (Session::has('contact'))
                                                            <div class="alert alert-success alert-dismissible contact-alert">
                                                                <button type="button" class="close" data-dismiss="alert"
                                                                    aria-hidden="true">×</button>
                                                                <h5><i class="icon fas fa-check"></i>
                                                                    {{ __('app.label_confirm') }}</h5>
                                                                {{ Session::get('contact') }}
                                                            </div>
                                                        @endif

                                                        <form class="form-horizontal" method="post"
                                                            action="{{ url('contact-us') }}">
                                                            @csrf
                                                            <div class="">
                                                                <h5>{{ __('app.label_contact_header') }}</h5>
                                                                <hr>
                                                                <div class="row">
                                                                    <input type="hidden" name="product_id"
                                                                        value="{{ $product->id }}">
                                                                    <div class="col-sm-6">

                                                                        <div class="form-group">
                                                                            <label>{{ __('app.label_fullname') }} <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" name="fullname"
                                                                                class="form-control"
                                                                                value="{{ old('fullname') }}">
                                                                            @if ($errors->has('fullname'))
                                                                                <div class="error text-danger text-sm mt-1">
                                                                                    {{ $errors->first('fullname') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>{{ __('app.label_email') }} <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="email" name="email"
                                                                                class="form-control"
                                                                                value="{{ old('email') }}">
                                                                            @if ($errors->has('email'))
                                                                                <div
                                                                                    class="error text-danger text-sm mt-1">
                                                                                    {{ $errors->first('email') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-6">

                                                                        <div class="form-group">
                                                                            <label>{{ __('app.label_phone') }} <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                name="phone"
                                                                                value="{{ old('phone') }}">
                                                                            @if ($errors->has('phone'))
                                                                                <div
                                                                                    class="error text-danger text-sm mt-1">
                                                                                    {{ $errors->first('phone') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>{{ __('app.label_you_are') }} <span
                                                                                    class="text-danger">*</span></label>
                                                                            <select name="you_are" id=""
                                                                                class="form-control select2s">
                                                                                <option value="1">
                                                                                    {{ __('app.label_guests') }}</option>
                                                                                <option value="2">
                                                                                    {{ __('app.label_agency') }}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>{{ __('app.label_contact_product') }}
                                                                                <span class="text-danger">*</span></label>
                                                                            <select name="import[]" id=""
                                                                                class="form-control select2s" multiple>
                                                                                <option value="Indoor Wpc Wall Panel">
                                                                                    Indoor Wpc Wall Panel</option>
                                                                                <option value="UV Marble Sheet">UV Marble
                                                                                    Sheet</option>
                                                                                <option value="Spc Flooring">Spc Flooring
                                                                                </option>
                                                                                <option value="Ceiling">Ceiling</option>
                                                                                <option value="PVC Foam Board">PVC Foam
                                                                                    Board</option>
                                                                                <option value="Outdoor Wall Cladding">
                                                                                    Outdoor Wall Cladding</option>
                                                                                <option value="WPC Decking">WPC Decking
                                                                                </option>
                                                                                <option value="Other Decorative Products">
                                                                                    Other Decorative Products</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">

                                                                        <div class="form-group">
                                                                            <label>{{ __('app.content_page') }}</label>
                                                                            <textarea class="form-control" name="content" rows="6">{{ old('content') }}</textarea>
                                                                            @if ($errors->has('content'))
                                                                                <div
                                                                                    class="error text-danger text-sm mt-1">
                                                                                    {{ $errors->first('content') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary pl-3 pr-3">
                                                                    <i class="fas fa-paper-plane me-3"></i>
                                                                    {{ __('app.btn_send') }}</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content bg-white mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="text-muted mt-4">{{ __('app.product_pop') }}
                        <a href="http://" class=" float-right btn btn-link text-muted text-md">{{ __('app.label_all') }}
                            <i class="fas fa-angle-double-right"></i></a>
                    </h5>
                    <hr class="style4">
                    <div class="row">
                        @foreach ($productes as $product)
                            <div class="col-lg-2">
                                <div class="card-hover">
                                    <a href="{{ url('/products/details', $product->id) }}">
                                        <div class="card-body">
                                            <img src="{{ url('products/', $product->photo) }}"
                                                class="img-item-product img-fluid">
                                            <h5 class="card-title text-muted">
                                                {{ app()->getLocale() == 'km' ? $product->product_name_km : $product->product_name }}
                                            </h5>
                                            <p class="card-text text-color-lhc">
                                                {{ "$" . number_format($product->salling_price, 2, '.', '.') }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                var $image_element = $(this).find('img')
                $('.product-image').prop('src', $image_element.attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            })
        })
    </script>
@endsection
