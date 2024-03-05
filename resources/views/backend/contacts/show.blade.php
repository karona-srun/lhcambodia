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
                            <table id="" class="table table-bordered table-hover">
                                <thead>
                                    <th>{{ __('app.label_requester') }}</th>
                                    <th>{{ __('app.label_email') }}</th>
                                    <th>{{ __('app.label_phone') }}</th>
                                    <th>{{ __('app.label_you_are') }}</th>
                                </thead>
                                <tbody>
                                    <td>{{ $contact->fullname }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td> <a href="tel:{{ $contact->phone }}"><span class="badge badge-primary"><i class=" fas fa-phone-volume"></i>  {{ $contact->phone }}</span></a> </td>
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
                        @if($contact->product_id)
                        <div class="col-12 col-sm-12 col-md-14 d-flex align-items-stretch flex-column">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">{{ __('app.product_info') }}</div>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="">
                                        <div class="card bg-light d-flex flex-fill">
                                        <div class="card-header text-muted border-bottom-0">
                                            {{ app()->getLocale() == "en" ? $contact->product->productCategory->name : $contact->product->productCategory->name_km }} /  {{ app()->getLocale() == "en" ? $contact->product->subCategory->name : $contact->product->subCategory->name_km }}
                                        </div>
                                        <div class="card-body pt-0">
                                        <div class="row">
                                        <div class="col-7">
                                        <h2 class="lead"><b>{{ app()->getLocale() == "en" ? $contact->product->product_name : $contact->product->product_name_km }}</b></h2>
                                        <h4 class="text-red">{{ "$" . number_format($contact->product->salling_price, 2, '.', '.') }}</h4>
                                        <h5 class="text-muted"><b>{{ __('app.label_scale')}}: {{ $contact->product->scale }}</b> </h5>
                                        <h6 class="text-muted"><b>{{ __('app.code')}}: {{ $contact->product->product_code }}</b> </h6>
                                        <h6 class="text-muted"><b>{{ __('app.label_color_code')}}: {{ $contact->product->color_code }}</b> </h6>
                                        
                                        </div>
                                        <div class="col-5 text-center">
                                        <img src="{{ url('products',$contact->product->photo) }}" alt="user-avatar" class=" img-size-150 img-fluid">
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                        @endif
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
                                                        <option value="1" {{ $contact->response_status == 1 ? 'selected' : '' }}>{{ __('app.label_requester') }}</option>
                                                        <option value="2"  {{ $contact->response_status == 2 ? 'selected' : '' }}>{{ __('app.label_replied') }}</option>
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
                                                    <input type="date" name="replied_at" class="form-control" value="{{ $contact->replied_at }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>{{ __('app.label_note') }}</label>
                                                    <textarea name="remark" class="form-control" rows="2">{{$contact->remark}}</textarea>
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
