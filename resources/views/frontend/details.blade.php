@extends('layouts.frontend')

@section('content')
    <div class="content">
        <div class="container">
            <div class="content-header">
                <div class="row">
                    <div class="col-sm-12 clear-pl">
                        <h1 class="m-0">{{ __('app.product') }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-muted"> <i class=" fas fa-home"></i> {{ __('app.home_page') }}</a>
                            </li>
                            @foreach ($data as $key => $item)
                                @if ($loop->last)
                                    <li class="breadcrumb-item"><a href="{{ url($key) }}">{!! $item !!}</a>
                                    </li>
                                @else
                                    <li class="breadcrumb-item active"><a href="{{ url($key) }}" class=" text-muted">{{ $item }}</a></li>
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
                            @foreach ($productCategory as $cate)
                                <a href="#" class="btn btn-block btn-light text-sm-left">{{ app()->getLocale() == 'en' ? $cate->name : $cate->name_km }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 mt-3">
                    <h5 class="text-muted">{{ __('app.product_info')}}</h5>
                    <hr class="style4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-solid">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="col-12">
                                                <img src="{{ '/products/' . $product->photo }}" class="product-image"
                                                    alt="Product Image">
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
                                            <h5 class="my-2 text-color-lhc">{{"$" . number_format($product->salling_price, 2, ".", ".")  }}</h5>
                                            <h6 class="my-1">{{ __('app.code')}}: {{ $product->product_code }}</h6>
                                            <h6 class="my-1">{{ __('app.label_color_code')}}: {{ $product->color_code }}</h6>

                                            <h5 class="mt-3">{{ __('app.label_scale') }}</h5>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-default btn-flat text-center">
                                                    <input type="radio" name="color_option" id="color_option_b1"
                                                        autocomplete="off">
                                                    <span class="text-lg">{{ $product->scale }}</span>
                                                </label>
                                            </div>
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-primary btn-flat">
                                                    <i class="fas fa-cart-plus mr-2"></i>
                                                    <span style="font-family: 'Khmer' !important;">{{__('app.label_add_cart')}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 mb-5">
                                        <div class="col-sm-12 p-3">
                                            <p class="style-lhc">
                                                <span style="border: 1px solid transparent;background: #f58f5a; padding: 5px 10px 2px 10px;color: #fff;">{{ __('app.label_description') }}</span>
                                            </p>
                                            <div class="mt-4">{!!$product->description !!}</div> 
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
                    <h5 class="text-muted mt-4">{{__('app.product_pop')}}
                        <a href="http://" class=" float-right btn btn-link text-muted text-md">{{ __('app.label_all') }} <i
                                class="fas fa-angle-double-right"></i></a>
                    </h5>
                    <hr class="style4">
                    <div class="row">
                        @foreach ($productes as $product)
                            <div class="col-lg-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-muted">{{ $product->product_name }}</h5>
                                        <br>
                                        <p class="text-muted">{{ $product->product_code }}</p>
                                        <img src="{{ url('products/', $product->photo) }}"
                                            class="img-item-product img-fluid">
                                        <p class="card-text text-muted">
                                            {{ Str::limit($product->description, 50) }}
                                        </p>

                                        <a href="{{ url('/product-details', $product->id) }}"
                                            class="btn  btn-outline-primary">{{ __('app.label_more_info') }}</a>
                                    </div>
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
