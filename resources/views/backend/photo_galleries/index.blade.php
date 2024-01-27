@extends('layouts.master')

@section('title-page', __('app.photo_galleries_page'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.photo_galleries_page') }}</h3>
                    <div class="card-tools">
                        <a href="{{ url('photo-galleries/create') }}" class="btn btn-primary"> <i
                                class=" fas fa-plus"></i>
                            {{ __('app.add_photo_galleries') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <p><span class="text-danger">{{ __('app.label_introduce') }}</span> :
                                {{ __('app.label_gallery_info') }}</p>

                        </div>
                        @foreach ($photoGalleries as $item)
                            <div class="col-sm-1 col-md-2 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-body" style="padding: 0px !important;">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <img src="{{ asset('photo_gallery/' . $item->image) }}" alt="slideshow"
                                                    class="img-rounded img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-center">
                                            <a href="{{ url("photo-galleries/{$item->id}/edit") }}" class="btn btn-icon btn-warning text-white btn-edit"
                                                > <i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ url('/photo-galleries-toggle-status', $item->id) }}"
                                                class="btn btn-icon {{ $item->status == 1 ? 'btn-danger' : 'btn-success' }}">
                                                <i
                                                    class="{{ $item->status == 1 ? 'fas fa-ban' : 'far fa-check-circle' }}"></i></a>
                                            <a href="#" class="btn btn-icon btn-danger deleteSlide"
                                                data-toggle="modal" data-target="#modal-default"
                                                data-id="{{ $item->id }}"> <i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-slideshow" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ url('photo-galleries') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('app.add_photo_galleries') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><span class="text-danger">{{ __('app.label_introduce') }}</span> :
                            {{ __('app.label_gallery_info') }}</p>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">{{ __('app.label_photo_choose') }}</label>
                                    <div>
                                        <img src="{{ asset('photo_gallery/temp.png') }}" id="previewImg"
                                            class="previewImg img-rounded" alt="" width="200px" height="200px"
                                            srcset="">
                                        <div class="mt-2">
                                            <input type="file" name="image" class="form-control form-control-file"
                                                id="image" onchange="previewFile(this);" required>
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

                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('app.label_photo_caption') }}</label>
                            <textarea name="body" id="caption" rows="5" class="form-control summernote body"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn  btn-danger" data-dismiss="modal"><i
                                class="fas fa-window-close"></i>
                            {{ __('app.btn_close') }}</button>
                        <button type="submit" class="btn  btn-primary"><i class="far fa-check-square"></i>
                            {{ __('app.btn_save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit-slideshow" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ url('photo-galleries') }}" class="formEdit" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('app.edit_photo_galleries') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><span class="text-danger">{{ __('app.label_introduce') }}</span> :
                            {{ __('app.label_gallery_info') }}</p>
                        <input type="hidden" name="id" class="id">
                        <div class="row">

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">{{ __('app.label_photo_choose') }}</label>
                                    <div>
                                        <img src="{{ asset('photo_gallery/temp.png') }}" id="previewImg"
                                            class="previewImg img-rounded image" alt="" width="200px"
                                            height="200px" srcset="">
                                        <div class="mt-2">
                                            <input type="file" name="image" class="form-control form-control-file"
                                                id="image" onchange="previewFile(this);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('app.label_photo_caption') }}</label>
                                    <textarea name="caption" id="caption" rows="3" class="form-control caption"></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('app.label_photo_caption') }}</label>
                            <div class="div-body"></div>
                            
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn  btn-danger" data-dismiss="modal"><i
                                class="fas fa-window-close"></i>
                            {{ __('app.btn_close') }}</button>
                        <button type="submit" class="btn  btn-primary"><i class="far fa-check-square"></i>
                            {{ __('app.btn_save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="formDelete" id="formDelete" action="foo" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-header">
                        <h5 class="modal-title text-bold">{{ __('app.label_confirm') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('app.label_confirm_delete') }}</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn  btn-danger" data-dismiss="modal"><i
                                class="fas fa-window-close"></i> {{ __('app.btn_close') }}</button>
                        <button type="submit" class="btn  btn-primary"><i class="far fa-check-square"></i>
                            {{ __('app.btn_delete') }}</button>
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

            $('.btn-edit').click(function() {
                var id = $(this).data("id");
                $('.formEdit').attr('action', 'photo-galleries/' + id);
                $.ajax({
                    url: "/photo-galleries/" + id,
                    method: "get",
                    success: function(data) {
                        console.log(data)
                        $('.id').val(data.id)
                        $('.caption').val(data.caption)
                        $('.image').attr('src', 'photo_gallery/' + data.image)
                        $('.body').val(data.body)
                    },
                });
            })

            $(".deleteSlide").click(function() {
                var id = $(this).data("id");
                $('.formDelete').attr('action', 'photo-galleries/' + id);
            });

        });
    </script>
@endsection
