
@extends('layouts.master')

@section('title-page', __('app.edit_item_sub_category'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.edit_item_sub_category') }}</h3>
                    <div class="card-tools">
                        @can('Item Sub Category List')
                        <a href="{{ url('/item-sub-category') }}" class="btn btn-primary"> <i class=" fas fa-list"></i>
                            {{ __('app.label_list') }} </a>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <form id="quickForm" action="{{ url('item-sub-category', $item->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>{{ __('app.item_category') }} <small class="text-red">*</small></label>
                                        <select name="item_category" id="item_category" class="select2 form-control">
                                            <option value="">{{__('app.table_choose')}}</option>
                                            @foreach ($items as $i)
                                                <option value="{{$i->id}}" {{ $i->id == $item->item_category_id ? 'selected' : ''}}>{{$i->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('item_category'))
                                            <div class="error text-danger text-sm mt-1">
                                                {{ $errors->first('item_category') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>{{ __('app.code') }} <small class="text-red">*</small></label>
                                        <input type="text" name="code" class="form-control"
                                            placeholder="{{ __('app.label_required') }}{{ __('app.code') }}" value="{{ $item->code }}">
                                        @if ($errors->has('code'))
                                            <div class="error text-danger text-sm mt-1">
                                                {{ $errors->first('code') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>{{ __('app.label_name') }} <small class="text-red">*</small></label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="{{ __('app.label_required') }}{{ __('app.label_name') }}" value="{{ $item->name }}">
                                        @if ($errors->has('name'))
                                            <div class="error text-danger text-sm mt-1">
                                                {{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('app.label_note') }}</label>
                                <input type="text" name="remark" class="form-control"
                                    placeholder="{{ __('app.label_required') }}{{ __('app.label_note') }}" value="{{ $item->note }}">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> {{ __('app.btn_save') }}</button>
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
