@extends('layouts.master')

@section('title-page', __('app.label_contact'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.label_contact_list') }}</h3>
                    <div class="card-tools">
                        {{-- @can('About Create')
                        <a href="{{ route('abouts.create') }}" class="btn  btn-primary"> <i class=" fas fa-plus"></i>
                            {{ __('app.btn_add') }}</a>
                        @endcan --}}
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>{{ __('app.table_no') }}</th>
                                <th>{{ __('app.label_requester') }}</th>
                                <th>{{ __('app.label_email') }}</th>
                                <th>{{ __('app.label_phone') }}</th>
                                <th>{{ __('app.label_contact_by') }}</th>
                                <th>{{ __('app.content_page') }}</th>
                                <th>{{ __('app.created_at') }}</th>
                                <th>{{ __('app.label_response_status')}}</th>
                                <th>{{ __('app.label_replied_by')}}</th>
                                <th>{{ __('app.label_replied_at')}}</th>
                                <th>{{ __('app.label_note') }}</th>
                                <th>{{ __('app.table_action') }}</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach ($contact as $i => $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td><span class="badge badge-primary"><i class=" fas fa-phone-volume"></i> {{ $item->phone }}</span></td>
                                    <td>{{ $item->you_are = 1 ? __('app.label_guests'):__('app.label_agency') }}</td>
                                    <td>{!! $item->content !!}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        @if ($item->response_status == "")
                                            <span class=" badge badge-danger">{{ __('app.label_not_yet') }}</span>
                                        @elseif ($item->response_status == 1)
                                            <span class=" badge badge-warning">{{__('app.label_requester') }}</span>
                                        @else
                                            <span class=" badge badge-success">{{__('app.label_replied') }}</span>
                                        @endif
                                    </td>
                                    <td><span class="badge badge-success">{{ $item->replied->name ?? ''}}</span></td>
                                    <td>{{ $item->replied_at }}</td>
                                    <td>{{ $item->remark }}</td>
                                    <td>
                                        <a href="{{ route('contacts.show',$item->id)}}" class="btn  btn-link"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-link text-danger deleteContact" data-toggle="modal" data-target="#modal-default" data-id="{{ $item->id }}"> <i class="fas fa-trash"></i> </a>
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
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.deleteContact').click(function() {
                var id = $(this).data('id')
                $('.formDelete').attr('action', 'contacts/' + id);
            });
        });
    </script>
@endsection
