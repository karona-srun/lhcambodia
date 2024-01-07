@extends('layouts.frontend')

@section('content')
    <div class="content">
        <div class="container-fluid container-fluid-cus">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @for ($i = 0; $i < $slide->count(); $i++)
                        @if ($i == 0)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="active">
                            </li>
                        @else
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="">
                            </li>
                        @endif
                    @endfor
                </ol>
                <div class="carousel-inner">
                    @foreach ($slide as $key => $item)
                        @if ($loop->first)
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('/slideshows/' . $item->image) }}" alt="First slide">
                            </div>
                        @else
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('/slideshows/' . $item->image) }}" alt="First slide">
                            </div>
                        @endif
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-sm-6">
                    <h4>{{ __('app.label_introduce') }}</h4>
                    <hr>
                    <p class="text-break">{{ app()->getlocale() == 'en' ? $profile->introduct : $profile->introduct_km }}
                    </p>
                </div>
                <div class="col-sm-6">
                    <iframe class="iframe-video" width="560" height="315"
                        src="https://www.youtube.com/embed/xByH2mVws_A?si=RJzH-2KfIX4y2aMn&amp;controls=0&amp;start=19&amp;rel=0&amp;autoplay=1&mute=1"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope;" allowfullscreen></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted mb-3">{{ __('app.product_category') }}</h5>
                            <hr>
                            <a href="{{ url('/') }}"
                                class="btn btn-block btn-light text-sm-left">{{ __('app.label_all') }}</a>
                            @foreach ($productCategory as $cate)
                                <a href="{{ url('/product-categories', $cate->id) }}"
                                    class="btn btn-block btn-light text-sm-left">{{ $cate->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <h5 class="text-muted">{{ __('app.label_new_product') }}
                        <a href="{{ url('products-list') }}"
                            class=" float-right btn btn-link text-muted text-md">{{ __('app.label_all') }} <i
                                class="fas fa-angle-double-right"></i></a>
                    </h5>
                    <hr class="style4">
                    <div class="row">
                        @foreach ($productes as $product)
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ url('products/' . $product->photo) }}"
                                            class="img-item-product img-fluid">
                                        <p class="card-title text-muted mt-2">{{ $product->product_name }}
                                            <br> {{ $product->product_code }}
                                            <br>#{{ $product->color_code }}
                                            <br>
                                            {{ Str::limit($product->description, 100) }}
                                        </p>

                                        <a href="{{ url('/product-details', $product->id) }}"
                                            class="btn  btn-outline-primary mt-2">{{ __('app.label_more_info') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="content bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4 mb-2">
                    <h5 class="text-muted">{{ __('app.label_pop_product') }}
                        <a href="{{ url('products-list') }}"
                            class=" float-right btn btn-link text-muted text-md">{{ __('app.label_all') }} <i
                                class="fas fa-angle-double-right"></i></a>
                    </h5>
                    <hr class="style4">
                    <div class="row">
                        @foreach ($producteRandom as $product)
                            <div class="col-lg-2">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ url('products/' . $product->photo) }}"
                                            class="img-item-product img-fluid">
                                        <p class="card-title text-muted mt-2">{{ $product->product_name }}
                                            <br> {{ $product->product_code }}
                                            <br>#{{ $product->color_code }}
                                            <br>
                                            {{ Str::limit($product->description, 100) }}
                                        </p>

                                        <a href="{{ url('/product-details', $product->id) }}"
                                            class="btn  btn-outline-primary mt-2">{{ __('app.label_more_info') }}</a>
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
