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
        <div class="container">

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
                <div class="col-sm-9">
                    <div class="row">
                        @foreach ($product as $item)
                            <div class="col-sm-3">
                                <div class="card">
                                    <a href="{{ url('/products/details', $item->id) }}">
                                        <img class="card-img-top" src="{{ url('products/' . $item->photo) }}"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title text-muted">
                                                {{ app()->getLocale() == 'km' ? $item->product_name_km : $item->product_name }}
                                            </h5>
                                            <p class="card-text text-color-lhc">
                                                {{ "$" . number_format($item->salling_price, 2, '.', '.') }}</p>
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
