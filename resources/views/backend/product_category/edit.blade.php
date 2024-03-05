@extends('layouts.master')

@section('title-page', __('app.edit_product_category'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.edit_product_category') }}</h3>
                    <div class="card-tools">
                        @can('Product Category List')
                            <a href="{{ url('/product-category') }}" class="btn  btn-primary"> <i class=" fas fa-list"></i>
                                {{ __('app.label_list') }} </a>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <form id="quickForm" action="{{ url('product-category', $product_category->id) }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="text-center mb-2 container">
                                        <img id="blah" src="{{ asset('images/product_image.png') }}" width="150px"​
                                            height="150px" class="img-bordered" alt="" srcset="">
                                        <input type="file" name="photo" id="imgInp" accept="image/*"
                                            class="btn  btn-file mt-2 imgInp" style="display: none">
                                        @if ($errors->has('photo'))
                                            <div class="error text-danger text-sm mt-1">
                                                {{ $errors->first('photo') }}</div>
                                        @endif
                                        <div>
                                            <button type="button" class="btn btn-outline-primary mt-3 blah"> <i
                                                    class="fas fa-images"></i> {{ __('app.btn_browser') }}</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>{{ __('app.code') }} <small class="text-red">*</small></label>
                                                <input type="text" name="code" class="form-control"
                                                    value="{{ $product_category->code }}"
                                                    placeholder="{{ __('app.label_required') }}{{ __('app.code') }}">
                                                @if ($errors->has('code'))
                                                    <div class="error text-danger text-sm mt-1">
                                                        {{ $errors->first('code') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>{{ __('app.product_category') }} <small
                                                        class="text-red">*</small></label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $product_category->name }}"
                                                    placeholder="{{ __('app.label_required') }}{{ __('app.product_category') }}">
                                                @if ($errors->has('name'))
                                                    <div class="error text-danger text-sm mt-1">
                                                        {{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>{{ __('app.product_category_km') }} <small
                                                        class="text-red">*</small></label>
                                                <input type="text" name="name_km" class="form-control"
                                                    value="{{ $product_category->name_km }}"
                                                    placeholder="{{ __('app.label_required') }}{{ __('app.product_category_km') }}">
                                                @if ($errors->has('name_km'))
                                                    <div class="error text-danger text-sm mt-1">
                                                        {{ $errors->first('name_km') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('app.label_note') }}</label>
                                <textarea rows="3" name="note" class="form-control"
                                    placeholder="{{ __('app.label_required') }}{{ __('app.label_note') }}">{{ $product_category->note }}</textarea>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn  btn-primary"> <i class="far fa-save"></i>
                                    {{ __('app.btn_save') }}</button>
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
