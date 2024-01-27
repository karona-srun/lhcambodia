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
                @foreach ($photoGallery as $index => $item)
                    <div class="col-sm-3 border-left">
                        <a href="{{ url('photo-gallery/details', $item->id) }}">
                            <div id="accordion">
                                <div class="">
                                    <div class="card-header card-header-cus">
                                        <div class="card-title">
                                            <h2 class="text-muted">{{ ++$index }}</h2>
                                            <strong class="text-muted">{{ Str::limit($item->caption, 60, '...') }}</strong>
                                        </div>
                                    </div>
                                    <div class="card-body text-center btn-card-body" data-caption="{{ $item->caption }}"
                                        data-image="{{ $item->image }}">
                                        <img src="{{ url('photo_gallery', $item->image) }}" class="img-rounded"
                                            width="100%" height="100%" alt="" srcset="">
                                    </div>
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
