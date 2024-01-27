@extends('layouts.frontend')
@section('content')
    <div class="content">
        <div class="container">
            <div class="content-header">
                <div class="row">
                    <div class="col-sm-12 clear-pl">
                        <h1 class="m-0">{{ __('app.faq_page') }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"
                                    class="text-muted">{{ __('app.home_page') }}</a>
                            </li>
                            @foreach ($data as $key => $item)
                                @if ($loop->last)
                                    <li class="breadcrumb-item"><a href="{{ url($key) }}">{!! $item !!}</a></li>
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
                <div class="col-sm-12">
                    @foreach ($faqs as $item)
                        {!! app()->getLocale() == 'km' ? $item->faq_km : $item->faq !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
