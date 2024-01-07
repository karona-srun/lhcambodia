@extends('layouts.master')

@section('title-page', __('app.label_contact'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.label_contact') }}</h3>
                    <div class="card-tools">
                        {{-- @can('About Create') --}}
                        <a href="{{ url('contacts') }}" class="btn  btn-primary"> <i class="fas fa-clipboard-list"></i>
                            {{ __('app.btn_back') }}</a>
                        {{-- @endcan --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th>{{ __('app.label_requester') }}</th>
                                    <th>{{ __('app.label_email') }}</th>
                                    <th>{{ __('app.label_phone') }}</th>
                                    <th>{{ __('app.label_you_are') }}</th>
                                </thead>
                                <tbody>
                                    <td>{{ $contact->fullname }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->response_status == '1' ? __('app.label_agency') : __('app.label_replied') }}
                                    </td>
                                </tbody>
                                <tfoot>
                                    <td colspan="4">
                                        <p class="text-break">{{ __('app.label_content') }}: {{ $contact->content }}</p>
                                    </td>
                                </tfoot>
                            </table>
                        </div>
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">{{ __('app.label_activity') }}</div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('contacts',$contact->id ) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>{{ __('app.label_response_status') }}</label>
                                                    <select name="response_status" class="select2s form-control">
                                                        <option value="1">{{ __('app.label_requester') }}</option>
                                                        <option value="2">{{ __('app.label_replied') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>{{ __('app.label_replied_by') }}</label>
                                                    <input type="hidden" name="replied_by" class="form-control" value="{{ Auth::user()->id }}">
                                                    <input type="text" name="auth_name" readonly class="form-control" value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>{{ __('app.table_date') }}</label>
                                                    <input type="date" name="replied_at" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>{{ __('app.label_note') }}</label>
                                                    <textarea name="remark" class="form-control" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{ __('app.btn_save') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        });
    </script>
@endsection
