@extends('layouts.frontend')

@section('content')
    <div class="content bg-white">
        <div class="container">
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
                                <img class="d-block w-100" src="{{ asset('/slideshows/' . $item->image) }}"
                                    alt="First slide">
                            </div>
                        @else
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('/slideshows/' . $item->image) }}"
                                    alt="First slide">
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
        <div class="container mt-4 pb-5">
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
            <div class="row mt-2">
                <div class="col-sm-12 mt-3 mb-3">

                    @foreach ($productCategory as $productCat)
                        <div class="row mb-3">
                            <div class="{{ $productCat->photo == "" ? '' : 'col-sm-3' }}">
                                <img src="{{ url('product_category', $productCat->photo) }}" width="100%" {{ $productCat->photo == "product_image.png" ? "height=360px" : ''}} class="rounded" alt=""
                                    srcset="">
                            </div>
                            <div class="{{ $productCat->photo == "" ? 'col-sm-12' : 'col-sm-9' }}">
                                <div class="p-2 mt-2">
                                    <h6 class="text-bold border-primary">
                                        {{ $productCat->product == "" ? '' : $productCat->name }}
                                        <button class="btn btn-lhc btn-flat float-right btn-more">{{__('app.label_more_info')}}</button>
                                    </h6>
                                </div>
                                @foreach ($productCat->product as $item)
                                    <div class="col-sm-4">
                                        <div class="card" style="box-shadow: 0 0 0px rgba(0,0,0,.125), 0 0px 0px rgba(0,0,0,.2)">
                                            <a href="{{ url('/product-details', $item->id) }}">
                                            <img class="card-img-top" src="{{ url('products/' . $item->photo) }}" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title text-muted">{{ app()->getLocale() == "km" ? $item->product_name_km : $item->product_name }}</h5>
                                                <p class="card-text text-color-lhc">{{"$" . number_format($item->salling_price, 2, ".", ".")  }}</p>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <hr class="style4">
                    @endforeach

                    <h5 class="text-muted">{{ __('app.label_new_product') }}
                        <a href="{{ url('products-list') }}"
                            class=" float-right btn btn-link text-muted text-md">{{ __('app.label_all') }} <i
                                class="fas fa-angle-double-right"></i></a>
                    </h5>
                    <hr class="style4">
                    <div class="row">
                        @foreach ($productes as $product)
                            <div class="col-sm-2">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ url('products/' . $product->photo) }}"
                                            class="img-item-product img-fluid">
                                        <p class="card-title text-muted">
                                            {{ $product->product_name_km }}<br>{{ $product->product_name }}</p>

                                        <a href="{{ url('/product-details', $product->id) }}"
                                            class="btn btn-block btn-outline-primary card-text mt-3 text-center">{{ __('app.label_more_info') }}</a>
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
