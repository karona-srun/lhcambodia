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
                                <a href="#"
                                    class="btn btn-block btn-light text-color-lhc text-sm-left"><i class="fas fa-angle-double-right me-3"></i> {{ app()->getLocale() == 'en' ? $menu_item->name : $menu_item->name_km }}</a>
                                    @foreach ($menu_item->subCategory as $submenu)
                                    <a href="{{ url('/decor-product/'.strtolower(str_replace(' ','-',$menu_item->name)).'/'.strtolower(str_replace(' ','-',$submenu->name)),$submenu->id) }}"
                                        class="btn btn-block {{ request()->id == $submenu->id ? 'btn-lhc' : 'btn-light' }} text-sm-left pl-4">{{ app()->getLocale() == 'en' ? $submenu->name : $submenu->name_km }}</a>
    
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
                                                    <img src="{{ '/products/' . $product->photo }}" id="img-1" class="product-image" alt="Zoom Image on Mouseover"/>
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
                                            <div class="mt-4">
                                                <a href="{{ url('/products/add-cart', $product->id) }}"
                                                    class="btn btn-lhc btn-flat">
                                                    <i class="fas fa-cart-plus mr-2"></i>
                                                    <span
                                                        style="font-family: 'Khmer' !important;">{{ __('app.label_add_cart') }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 mb-5">
                                        <div class="col-sm-12 p-3">
                                            <p class="style-lhc">
                                                <span
                                                    style="border: 1px solid transparent;background: #f58f5a; padding: 10px 10px 10px 10px;color: #fff;">{{ __('app.label_description') }}</span>
                                            </p>
                                            <div class="mt-4">{!! $product->description !!}</div>
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
                        <a href="http://" class=" float-right btn btn-link text-muted text-md">{{ __('app.label_all') }} <i
                                class="fas fa-angle-double-right"></i></a>
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
