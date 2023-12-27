@extends('layouts.master')

@section('title-page', __('app.product_category'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.product_category') }}</h3>
                    <div class="card-tools">
                        @can('Product Category List')
                        <a href="{{ url('/product-sub-category') }}" class="btn  btn-primary"> <i class=" fas fa-list"></i>
                            {{ __('app.label_list') }} </a>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <blockquote>
                                <p class="text-black">{{ __('app.product_category') }}</p>
                                <label>{{ $sub_cat->productCategory->name ?? '' }}</label>
                                <p class="text-black">{{ __('app.code') }}</p>
                                <label>{{ $sub_cat->code }}</label>
                                <p class="text-black">{{ __('app.product_sub_category') }}</p>
                                <label>{{ $sub_cat->name }}</label>
                            </blockquote>
                        </div>
                        <div class="col-sm-6">
                            <blockquote>
                                <p class="text-black">{{ __('app.label_note') }}</p>
                                <label>{{ $sub_cat->note }}</label>
                            </blockquote>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <blockquote class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>{{ __('app.label_creator') }}</p>
                                        <p class="text-black">{{ __('app.created_by') }}: 
                                        <label>{{ $sub_cat->creator->name ?? ''}}</label></p>
                                        <p class="text-black">{{ __('app.created_at') }}: 
                                        <label>{{ $sub_cat->created_at }}</label></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>{{ __('app.label_updator') }}</p>

                                        <p class="text-black">{{ __('app.updated_by') }}: 
                                        <label>{{ $sub_cat->updator->name ?? ''}}</label></p>
                                        <p class="text-black">{{ __('app.updated_at') }}: 
                                        <label>{{ $sub_cat->updated_at }}</label></p>
                                    </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(function() {

        });
    </script>
@endsection
