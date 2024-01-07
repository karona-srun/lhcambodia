@extends('layouts.master')

@section('title-page', __('app.faq_page'))

@section('css')
<style type="text/css">
    .read-more-show{
      cursor:pointer;
      color: #ed8323;
    }
    .read-more-hide{
      cursor:pointer;
      color: #ed8323;
    }

    .hide_content{
      display: none;
    }
</style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.faqs_list') }}</h3>
                    <div class="card-tools">
                        @can('Create Item Category')
                            <a href="{{ url('faqs/create') }}" class="btn btn-primary"> <i class=" fas fa-plus"></i>
                                {{ __('app.btn_add') }}</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>{{ __('app.table_no') }}</th>
                                <th>{{ __('app.faqs_km') }}</th>
                                <th>{{ __('app.faqs_en') }}</th>
                                <th>{{ __('app.table_action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i => $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        @if(strlen($item->faq_km) > 50)
                                        {{ strip_tags($item->faq_km) }}
                                        <span class="read-more-show hide_content"> More <i class="fa fa-angle-down"></i></span>
                                        <span class="read-more-content"> {{ strip_tags(($item->faq_km)) }} 
                                        <span class="read-more-hide hide_content"> Less <i class="fa fa-angle-up"></i></span> </span>
                                        @else
                                        {!! $item->faq_km !!}
                                        @endif
                                    </td>
                                    <td>
                                        @if(strlen($item->faq) > 50)
                                        {{ Str::words(strip_tags($item->faq)) }}
                                        <span class="read-more-show hide_content"> More <i class="fa fa-angle-down"></i></span>
                                        <span class="read-more-content"> {{ Str::words(strip_tags($item->faq)) }} 
                                        <span class="read-more-hide hide_content"> Less <i class="fa fa-angle-up"></i></span> </span>
                                        @else
                                        {!! $item->faq !!}
                                        @endif
                                    </td>
                                    <td>
                                        @can('Edit Item Category')
                                            <a href="{{ route('faqs.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                        @endcan
                                        @can('Delete Item Category')
                                            <button type="button" class="btn btn-sm btn-danger deleteProductCategory" data-toggle="modal"
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
                        <h5 class="modal-title text-bold">{{__('app.label_confirm')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('app.label_confirm_delete') }}</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger"
                            data-dismiss="modal"> <i class="far fa-window-close"></i> {{ __('app.btn_close') }}</button>
                        <button type="submit" class="btn btn-primary"> <i class="far fa-check-square"></i> {{ __('app.btn_delete') }}</button>
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
                $('.formDelete').attr('action', 'faqs/' + id);
            });

            $('.read-more-content').addClass('hide_content')
            $('.read-more-show, .read-more-hide').removeClass('hide_content')

            // Set up the toggle effect:
            $('.read-more-show').on('click', function(e) {
              $(this).next('.read-more-content').removeClass('hide_content');
              $(this).addClass('hide_content');
              e.preventDefault();
            });

            // Changes contributed by @diego-rzg
            $('.read-more-hide').on('click', function(e) {
              var p = $(this).parent('.read-more-content');
              p.addClass('hide_content');
              p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
              e.preventDefault();
            });

        });
    </script>
@endsection
