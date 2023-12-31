@extends('layouts.master')

@section('title-page', __('app.label_about'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.label_content') }}</h3>
                    <div class="card-tools">
                        @can('About List')
                        <a href="{{ route('abouts.index') }}" class="btn  btn-outline-primary"> <i class=" fas fa-list"></i>
                            {{ __('app.label_list') }}{{ __('app.label_content') }}</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <form id="customerForm" action="{{ url('/abouts') }}" method="post" >
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label>{{ __('app.about_title_km') }} <small
                                            class="text-red">*</small></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('customer_name') }}"
                                        placeholder="{{ __('app.label_name') }}" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label>{{ __('app.about_title_en') }} <small
                                            class="text-red">*</small></label>
                                    <input type="text" name="name_en" class="form-control" value="{{ old('customer_name') }}"
                                        placeholder="{{ __('app.label_name') }}" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label>{{ __('app.about_content_km') }} <small class="text-red">*</small></label>
                                    <textarea name="content" class="form-control summernote" rows="3"
                                        placeholder="{{ __('app.label_required') }}{{ __('app.label_content') }}">{{ old('content') }}</textarea>
                                    @if ($errors->has('content'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('content') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label>{{ __('app.about_content_en') }} <small class="text-red">*</small></label>
                                    <textarea name="content_en" class="form-control summernote" rows="3"
                                        placeholder="{{ __('app.label_required') }}{{ __('app.label_content') }}">{{ old('content') }}</textarea>
                                    @if ($errors->has('content'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('content') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn pl-3 pr-3 btn-primary "> <i class="fas fa-save"></i>
                            {{ __('app.btn_save') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
    $(function() {
$('.summernote').summernote({
    height: 200,
    placeholder: 'សរសេរពិពណ៌នាកិច្ចសន្យា',});
})
</script>
@endsection
