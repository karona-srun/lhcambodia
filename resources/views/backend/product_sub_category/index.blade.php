@extends('layouts.master')

@section('title-page', __('app.product_sub_category'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.product_sub_category_list') }}</h3>
                    <div class="card-tools">
                        <a href="{{ url('/import-product-category') }}" class="btn  btn-outline-primary"> <i class="fas fa-file-import"></i>
                            {{ __('app.btn_import_product')}}</a>
                        <a href="{{ url('/product-category-exportexcel') }}" class="btn  btn-outline-primary"> <i class=" fas fa-download"></i>
                            {{ __('app.btn_download') }}</a>
                        @can('Product Sub Category Create')
                        <a href="{{ url('product-sub-category/create') }}" class="btn  btn-primary"> <i class=" fas fa-plus"></i>
                            {{ __('app.btn_add') }}</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>{{ __('app.table_no') }}</th>
                                <th>{{ __('app.product_category') }}</th>
                                <th>{{ __('app.code') }}</th>
                                <th>{{ __('app.label_name') }}</th>
                                <th>{{ __('app.table_action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subCategory as $i => $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>. {{ $item->productCategory->name_km ?? '' }} <br>. {{ $item->productCategory->name ?? '' }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>. {{ $item->name_km }} <br>. {{ $item->name }}</td>
                                    <td>
                                        @can('Product Sub Category Create')
                                        <a href="{{ route('product-sub-category.show',$item->id) }}" class="btn  btn-primary"><i
                                                class="far fa-eye"></i></a>
                                        @endcan
                                        @can('Product Sub Category Edit')
                                        <a href="{{ route('product-sub-category.edit',$item->id) }}"  class="btn  btn-warning"><i
                                                class="far fa-edit"></i></a>
                                        @endcan
                                        @can('Product Sub Category Delete')
                                        <button class="btn  btn-danger deleteProductCategory" data-toggle="modal"
                                            data-target="#modal-default" data-id="{{ $item->id }}"><i
                                                class="far fa-trash-alt"></i></button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="formDelete" action="foo" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-header">
                        <h5 class="modal-title text-bold">{{__('app.product_sub_category')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('app.label_confirm_delete') }}</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn  btn-danger"
                            data-dismiss="modal"> <i class="far fa-window-close"></i> {{ __('app.btn_close') }}</button>
                        <button type="submit" class="btn  btn-primary"> <i class="far fa-save"></i> {{ __('app.btn_delete') }}</button>
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

            $(".deleteProductCategory").click(function() {
                var id = $(this).data("id");
                $('.formDelete').attr('action', 'product-sub-category/' + id);
            });

        });
    </script>
@endsection
