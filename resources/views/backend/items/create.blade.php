

@extends('layouts.master')

@section('title-page', __('app.create_item'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.create_item') }}</h3>
                    <div class="card-tools">
                        @can('Item List')
                        <a href="{{ url('/itemes') }}" class="btn btn-primary"> <i class=" fas fa-list"></i>
                            {{ __('app.label_list') }} </a>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <form id="quickForm" action="{{ url('itemes') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="text-center mb-2 container">
                                        <img id="blah" src="{{ asset('images/product_image.png') }}" width="150px"​
                                            height="150px" class="rounded-circle img-bordered" alt=""
                                            srcset="">
                                        <input type="file" name="photo" id="imgInp" accept="image/*"
                                            class="btn btn-sm btn-file mt-2 imgInp" style="display: none">
                                        @if ($errors->has('photo'))
                                            <div class="error text-danger text-sm mt-1">
                                                {{ $errors->first('photo') }}</div>
                                        @endif
                                        <button type="button"
                                            class="btn btn-sm btn-outline-primary mt-2 blah">{{ __('app.btn_browser') }}</button>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>{{ __('app.item_category') }} <small class="text-red">*</small></label>
                                                <select name="item_category" id="item_group" class="select2 form-control">
                                                    <option value="">{{__('app.table_choose')}}</option>
                                                    @foreach ($itemCategory as $g)
                                                        <option value="{{$g->id}}" {{ old('item_category') == $g->id ? 'selected' : '' }}>{{$g->name}}</option>
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
                                                <label>{{ __('app.item_sub_category') }} <small class="text-red">*</small></label>
                                                <select name="item_sub_category" id="item_sub_group" class="select2 form-control">
                                                    <option value="">{{__('app.table_choose')}}</option>
                                                    @foreach ($itemSubCategory as $isg)
                                                        <option value="{{$isg->id}}" {{ old('item_sub_category') == $isg->id ? 'selected' : '' }}>{{$isg->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('item_sub_category'))
                                                    <div class="error text-danger text-sm mt-1">
                                                        {{ $errors->first('item_sub_category') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>{{ __('app.code') }} <small class="text-red">*</small></label>
                                                <input type="text" name="item_code" class="form-control"
                                                    placeholder="{{ __('app.label_required') }}{{ __('app.code') }}" value="{{old('item_code')}}">
                                                @if ($errors->has('item_code'))
                                                    <div class="error text-danger text-sm mt-1">
                                                        {{ $errors->first('item_code') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>{{ __('app.label_color_code') }} <small class="text-red">*</small></label>
                                                    <input type="text" name="color" class="form-control"
                                                        placeholder="{{ __('app.label_required') }}{{ __('app.label_color_code') }}" value="{{old('color')}}">
                                                    @if ($errors->has('color'))
                                                        <div class="error text-danger text-sm mt-1">
                                                            {{ $errors->first('color') }}</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>{{ __('app.label_name') }} <small class="text-red">*</small></label>
                                                    <input type="text" name="item_name" class="form-control"
                                                        placeholder="{{ __('app.label_required') }}{{ __('app.label_name') }}" value="{{old('item_name')}}">
                                                    @if ($errors->has('item_name'))
                                                        <div class="error text-danger text-sm mt-1">
                                                            {{ $errors->first('item_name') }}</div>
                                                    @endif
                                                </div>
                                        </div>
                                        <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>{{ __('app.label_scale') }} <small class="text-red">*</small></label>
                                                    <input type="text" name="scale" class="form-control"
                                                        placeholder="{{ __('app.label_required') }}{{ __('app.label_scale') }}" value="{{old('scale')}}">
                                                    @if ($errors->has('scale'))
                                                        <div class="error text-danger text-sm mt-1">
                                                            {{ $errors->first('scale') }}</div>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>{{ __('app.label_buying_price') }}</label>
                                                <input type="number" step="any" name="buying_price" class="form-control" value="{{old('buying_price')}}">
                                                @if ($errors->has('buying_price'))
                                                        <div class="error text-danger text-sm mt-1">
                                                            {{ $errors->first('buying_price') }}</div>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>{{ __('app.label_buying_date') }}</label>
                                                <input type="date" name="buying_date" class="form-control" value="{{old('buying_date')}}">
                                                @if ($errors->has('buying_date'))
                                                        <div class="error text-danger text-sm mt-1">
                                                            {{ $errors->first('buying_date') }}</div>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>{{ __('app.label_qty') }}</label>
                                                <input type="number" name="qty" class="form-control" value="{{old('qty')}}">
                                                @if ($errors->has('qty'))
                                                <div class="error text-danger text-sm mt-1">
                                                    {{ $errors->first('qty') }}</div>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>{{ __('app.label_item_status') }}</label>
                                                <select name="condition" id="status" class="select2s form-control">
                                                    <option value="0" {{ old('condition') == 0 ? 'selected':'' }}>{{ __('app.label_old_item') }}</option>
                                                    <option value="1" {{ old('condition') == 1 ? 'selected':'' }}>{{ __('app.label_new_item') }}</option>
                                                    <option value="2" {{ old('condition') == 2 ? 'selected':'' }}>{{ __('app.label_second_hand_item') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('app.label_note') }}</label>
                                        <input type="text" name="remark" class="form-control"
                                            placeholder="{{ __('app.label_required') }}{{ __('app.label_note') }}" value="{{old('remark')}}">
                                    </div>
                                </div>
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
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                }
            }

            $('.blah').on('click', function() {
                $('.imgInp').trigger('click');
            });
        });
    </script>
@endsection
