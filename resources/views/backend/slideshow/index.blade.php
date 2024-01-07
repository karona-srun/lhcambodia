@extends('layouts.master')

@section('title-page', __('app.slideshow'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.slideshow_list') }}</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-slideshow"> <i
                                class=" fas fa-plus"></i>
                            {{ __('app.add_slideshow') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <p><span class="text-danger">{{ __('app.label_introduce') }}</span> :
                                {{ __('app.label_slideshow_info') }}</p>

                        </div>
                        @foreach ($slideshow as $item)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                {{-- <div class="card-header text-muted border-bottom-0">
                                    Digital Strategist
                                </div> --}}
                                <div class="card-body" style="padding: 0px !important;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <img src="{{ asset('slideshows/'.$item->image)}}" alt="slideshow"
                                                class=" img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="#" class="btn btn-icon btn-warning text-white btn-edit" data-id="{{ $item->id }}" data-toggle="modal" data-target="#modal-edit-slideshow"> <i class="fas fa-pencil-alt"></i> {{ __('app.btn_edit') }}</a>
                                        <a href="{{ url('/slideshows-toggle-status',$item->id)}}" class="btn btn-icon {{ $item->status == 1 ? 'btn-danger' : 'btn-success'}}"> <i class="{{ $item->status == 1 ? 'fas fa-ban' :'far fa-check-circle' }}"></i>
                                            {{ $item->status == 1 ? __('app.label_blocked') : __('app.label_unblocked') }}</a>
                                        <a href="#" class="btn btn-icon btn-danger deleteSlide" data-toggle="modal" data-target="#modal-default" data-id="{{ $item->id }}"> <i class="fas fa-trash-alt"></i>
                                            {{ __('app.btn_delete') }}</a>
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ url('slideshow') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('app.add_slideshow') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><span class="text-danger">{{ __('app.label_introduce') }}</span> :
                            {{ __('app.label_slideshow_info') }}</p>
                        <img src="{{ asset('slideshows/thumb.png') }}" id="previewImg" class="previewImg img-rounded img-size-150" alt=""
                            srcset="">
                        <input type="file" name="image" id="image" onchange="previewFile(this);" required>
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ url('slideshow') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('app.update_slideshow') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" class="id">
                        <p><span class="text-danger">{{ __('app.label_introduce') }}</span> :
                            {{ __('app.label_slideshow_info') }}</p>
                        <img src="{{ asset('slideshows/thumb.png') }}" class="previewImg image img-size-150" alt=""
                            srcset="">
                        <input type="file" name="image" id="image">
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
                        <h5 class="modal-title text-bold">{{__('app.label_confirm')}}</h5>
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

            function previewFile(input){
                var file = $("input[type=file]").get(0).files[0];
        
                if(file){
                    var reader = new FileReader();
        
                    reader.onload = function(){
                        $(".previewImg").attr("src", reader.result);
                    }
        
                    reader.readAsDataURL(file);
                }
            }

            $('.btn-edit').click(function() {
                var id = $(this).data("id");

                $.ajax({
                    url: "/slideshow/" + id,
                    method: "get",
                    success: function(data) {
                        $('.id').val(data.id)
                        $('.image').attr('src','slideshows/'+data.image)
                    },
                });
            })

            $(".deleteSlide").click(function() {
                var id = $(this).data("id");
                $('.formDelete').attr('action', 'slideshow/' + id);
            });

        });
    </script>
@endsection
