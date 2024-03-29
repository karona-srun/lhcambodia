@extends('layouts.master')

@section('title-page', __('app.product_list'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.product_list') }}</h3>
                    <div class="card-tools">
                        <a href="{{ url('/import-product') }}" class="btn  btn-outline-primary"> <i class="fas fa-file-import"></i>
                            {{ __('app.btn_import_product')}}</a>
                        <a href="{{ url('/productes-exportexcel ') }}" class="btn  btn-outline-primary"> <i class=" fas fa-download"></i>
                            {{ __('app.btn_download') }}</a>
                        @can('Product Create')
                        <a href="{{ url('productes/create') }}" class="btn  btn-primary"> <i class=" fas fa-plus"></i>
                            {{ __('app.btn_add') }}</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>{{ __('app.table_no') }}</th>
                                <th>{{ __('app.table_photo') }}</th>
                                <th class="w-15">{{ __('app.product_category') }}</th>
                                <th class="w-15">{{ __('app.product_sub_category') }}</th>
                                <th class="w-10">{{ __('app.code') }}</th>
                                <th class="w-10">{{ __('app.label_color_code') }}</th>
                                <th class="w-10">{{ __('app.label_name') }}{{ __('app.product') }}</th>
                                <th class="w-10">{{ __('app.label_scale') }}</th>
                                <th>{{ __('app.label_salling_price') }}</th>
                                <th>{{ __('app.label_buying_price') }}</th>
                                <th>{{ __('app.label_buying_date') }}</th>
                                <th>{{ __('app.label_store_stock') }}</th>
                                <th>{{ __('app.label_warehouse') }}</th>
                                <th class="w-15">{{ __('app.table_action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $i => $item)
                                <tr class="{{ $item->store_stock == 0 ? 'bg-danger' : '' }}">
                                    <td>{{ ++$i }}</td>
                                    <td style="width:70px !important"><img src="{{ url('products/'.$item->photo) }}" class="img-size-50 img-thumbnail" srcset=""/></td>
                                    <td>. {{ $item->subCategory->name_km ?? '' }}<br>. {{ $item->subCategory->name ?? '' }}</td>
                                    <td>.{{ $item->productCategory->name_km ?? '' }}<br>. {{ $item->productCategory->name ?? '' }}</td>
                                    <td>{{ $item->product_code }}</td>
                                    <td>{{ $item->color_code }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->scale }}</td>
                                    <td>{{ $item->salling_price }}</td>
                                    <td>{{ $item->buying_price }}</td>
                                    <td>{{ $item->buying_date }}</td>
                                    <td>{{ $item->store_stock }}</td>
                                    <td>{{ $item->warehouse }}</td>
                                    <td>
                                        @can('Product List')
                                        <a href="{{ route('productes.show',$item->id) }}" class="btn  btn-primary"><i
                                                class="far fa-eye"></i></a>
                                                @endcan
                                                @can('Product Edit')
                                        <a href="{{ url('transf-productes-qty',$item->id) }}" class="btn  btn-primary"><i class="fas fa-truck"></i></a>
                                        <a href="{{ route('productes.edit',$item->id) }}"  class="btn  btn-warning"><i
                                                class="far fa-edit"></i></a>
                                                @endcan
                                                @can('Product Delete')
                                        <button class="btn  btn-danger deleteProduct" data-toggle="modal"
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
                        <h5 class="modal-title text-bold">{{__('app.delete_product')}}</h5>
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

            $(".deleteProduct").click(function() {
                var id = $(this).data("id");
                $('.formDelete').attr('action', 'productes/' + id);
            });

        });
    </script>
@endsection
