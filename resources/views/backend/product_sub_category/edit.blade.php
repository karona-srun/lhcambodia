@extends('layouts.master')

@section('title-page', __('app.edit_product_sub_category'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.edit_product_sub_category') }}</h3>
                    <div class="card-tools">
                        @can('Product Sub Category List')
                        <a href="{{ url('/product-sub-category') }}" class="btn  btn-primary"> <i class=" fas fa-list"></i>
                            {{ __('app.label_list') }} </a>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <form id="quickForm" action="{{ url('product-sub-category', $item->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                    <label>{{ __('app.product_category') }} <small
                                            class="text-red">*</small></label>
                                    <select name="product_category" id="product_category" class="select2Custom form-control">
                                        <option value="" data-foo="-">{{__('app.table_choose')}}</option>
                                        @foreach ($category as $cat)
                                            <option value="{{$cat->id}}" {{ $cat->id == $item->product_category_id ? 'selected' : '' }} data-foo="{{$item->code}}" >{{ $cat->name_km }} {{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('product_category'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('product_category') }}</div>
                                    @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                    <label>{{ __('app.code') }} <small
                                            class="text-red">*</small></label>
                                    <input type="text" name="code" class="form-control" value="{{ $item->code }}"
                                        placeholder="{{ __('app.label_required') }}{{ __('app.code') }}">
                                    @if ($errors->has('code'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('code') }}</div>
                                    @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                    <label>{{ __('app.product_category') }} <small
                                            class="text-red">*</small></label>
                                    <input type="text" name="name" class="form-control" value="{{ $item->name }}"
                                        placeholder="{{ __('app.label_required') }}{{ __('app.product_category') }}">
                                    @if ($errors->has('name'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('name') }}</div>
                                    @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                    <label>{{ __('app.product_sub_category_km') }} <small
                                            class="text-red">*</small></label>
                                    <input type="text" name="name_km" class="form-control" value="{{ $item->name_km }}"
                                        placeholder="{{ __('app.label_required') }}{{ __('app.product_sub_category_km') }}">
                                    @if ($errors->has('name_km'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('name_km') }}</div>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('app.label_note') }}</label>
                                <textarea rows="3" name="note" class="form-control"
                                    placeholder="{{ __('app.label_required') }}{{ __('app.label_note') }}">{{ $item->note }}</textarea>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn  btn-primary"> <i class="far fa-save"></i> {{ __('app.btn_save') }}</button>
                            </div>
                        </div>
                    </form>
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
