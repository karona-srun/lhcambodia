
@extends('layouts.master')

@section('title-page', __('app.add_photo_galleries'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.add_photo_galleries') }}</h3>
                    <div class="card-tools">
                        <a href="{{ url('photo-galleries') }}" class="btn btn-primary"> <i class="fas fa-arrow-left"></i>
                            {{ __('app.photo_galleries_page') }}</a>
                    </div>
                </div>
                <form action="{{ url('photo-galleries') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <p><span class="text-danger">{{ __('app.label_introduce') }}</span> :
                                    {{ __('app.label_gallery_info') }}</p>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputFile">{{ __('app.label_photo_choose') }}</label>
                                            <div>
                                                <img src="{{ asset('photo_gallery/temp.png') }}" id="previewImg"
                                                    class="previewImg img-rounded" alt="" width="200px"
                                                    height="200px" srcset="">
                                                <div class="mt-2">
                                                    <input type="file" name="image"
                                                        class="form-control form-control-file" id="image"
                                                        onchange="previewFile(this);">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{ __('app.label_photo_caption') }}</label>
                                            <textarea name="caption" id="caption" rows="3" class="form-control">{{ old('caption') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{ __('app.label_photo_caption') }}</label>
                                            <textarea name="body" id="caption" rows="10" class="form-control summernote body">{!! old('body') !!}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i>
                                    {{ __('app.btn_save') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function previewFile(input) {
                var file = $("input[type=file]").get(0).files[0];

                if (file) {
                    var reader = new FileReader();

                    reader.onload = function() {
                        $(".previewImg").attr("src", reader.result);
                    }

                    reader.readAsDataURL(file);
                }
            }
        })
    </script>
@endsection
