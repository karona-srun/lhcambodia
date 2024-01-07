
@extends('layouts.master')

@section('title-page', __('app.edit_faqs'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.edit_faqs') }}</h3>
                    <div class="card-tools">
                        @can('Item Category List')
                        <a href="{{ url('/faqs') }}" class="btn btn-primary"> <i class=" fas fa-list"></i>
                            {{ __('app.label_list') }} </a>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <form id="quickForm" action="{{ url('faqs', $faq->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{ __('app.faqs_km') }} <small class="text-red">*</small></label>
                                        <textarea name="faqs_km" class="form-control summernote" rows="10">{{ $faq->faq_km }}</textarea>
                                        @if ($errors->has('faqs_km'))
                                            <div class="error text-danger text-sm mt-1">
                                                {{ $errors->first('faqs_km') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{ __('app.faqs_en') }} <small class="text-red">*</small></label>
                                        <textarea name="faqs_en" class="form-control summernote" rows="10">{{ $faq->faq }}</textarea>
                                        @if ($errors->has('faqs_en'))
                                            <div class="error text-danger text-sm mt-1">
                                                {{ $errors->first('faqs_en') }}</div>
                                        @endif
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
            
        });
    </script>
@endsection
