@extends('layouts.frontend')
@section('content')
    <div class="content">
        <div class="container">
            <div class="content-header">
                <div class="row">
                    <div class="col-sm-12 clear-pl">
                        <h1 class="m-0">{{ __('app.photo_galleries_page') }}</h1>
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
            <div class="row">
                <div class="col-sm-3">
                    <div id="accordion">
                        <div class="">
                            <div class="card-body text-center btn-card-body" data-caption="{{ $photoGallery->caption }}"
                                data-image="{{ $photoGallery->image }}" data-toggle="modal" data-target="#myModal">
                                <img src="{{ url('photo_gallery', $photoGallery->image) }}" class="img-rounded"
                                    width="100%" height="100%" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 border-left">
                    <div class="card-header card-header-cus">
                        <div class="card-title">
                            <h1>{{ $photoGallery->caption }}</h1>
                            <small> <i class="fas fa-calendar-alt"></i> {{ Carbon::parse($photoGallery->created_at)->format('d-M-Y') }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12">
                    {!! $photoGallery->body !!}
                </div>
            </div>
        </div>
        <div class="container mt-2 pb-5">
            <div class="mb-1 pb-2" style="border-bottom: 2px solid #fd7e15;">
                <span class="bg-orange p-2" style="color: #fff !important">{{__('app.photo_galleries_page')}}</span>
            </div>
            <div class="row p-2 mt-2">
                @foreach ($photos as $index => $photo)
                    <div class="col-sm-2 m-4 rounded box-shadow" style="padding: 0px">
                        <a href="{{ url('photo-gallery/details', $photo->id) }}">
                            <div id="accordion">
                                <div class="text-center btn-card-body" data-caption="{{ $photo->caption }}"
                                    data-image="{{ $photo->image }}">
                                    <img src="{{ url('photo_gallery', $photo->image) }}" class="img-rounded" height="200px" width="200px"
                                        height="100%" alt="" srcset="">
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.btn-card-body').click(function(e) {
                $('.caption').text($(this).data('caption'))
                $('.image').attr('src', 'photo_gallery/' + $(this).data('image'))
            });
        });
    </script>
@endsection
