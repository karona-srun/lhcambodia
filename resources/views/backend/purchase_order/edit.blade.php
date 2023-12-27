@extends('layouts.master')

@section('title-page', __('app.edit_purchase_order'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.edit_purchase_order') }}</h3>
                    <div class="card-tools">
                        <a href="{{ url('/purchase-order-exportexcel') }}" class="btn btn-outline-primary"> <i
                                class=" fas fa-download"></i>
                            {{ __('app.btn_download') }}</a>
                        @can('WorkPlace Create')
                            <a href="{{ url('purchase-order/create') }}" class="btn btn-primary"> <i
                                    class=" fas fa-plus"></i>
                                {{ __('app.btn_add') }}</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection