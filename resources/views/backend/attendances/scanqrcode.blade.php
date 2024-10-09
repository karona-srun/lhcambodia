@extends('layouts.auth')
@section('title-page', 'Scan Attendance')

@section('content')
    <div class="container mb-5 mt-5 p-5">
        <div class="card card-outline card-primary">
            <div class="row justify-content-center align-content-center">
                <div class="col-sm-12">
                    <div class="card-header text-center ">
                        <div>
                            <img src="{{ url($profile->photo) }}" width="100px" alt="">
                        </div>
                        <a href="{{ url('/') }}" class="h1"><b>{{ $profile->name }}</b></a>
                    </div>
                    <div class="card-header">
                        <h3>Attendance Form</h3>
                        <p>Please choose staff and type to enter your attendance.</p>
                    </div>
                    <form class="form-horizontal" method="post" action="{{ url('attendances/scan/qrcode') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Staff List <span
                                        class="text-red">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="staff" id="staff" style="width: 100%;"
                                        required>
                                        <option value="">{{ __('app.label_all') }}</option>
                                        @foreach ($staffinfo as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == request()->get('staff') ? 'selected' : '' }}>
                                                {{ $item->full_name_kh == null ? $item->full_name : $item->full_name_kh }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Type <span
                                        class="text-red">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control select2s" name="type" id="type" style="width: 100%;"
                                        required>
                                        <option value="0">Check In</option>
                                        <option value="1">Check Out</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Remark</label>
                                <div class="col-sm-10">
                                    <textarea name="note" class="form-control" cols="30" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    @if (Session::has('success'))
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">×</button>
                                            <h5><i class="icon fas fa-check"></i> Result!</h5>
                                            @foreach (Session::get('success') as $item)
                                                <span>{{ $item }}</span><br>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-default float-right">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
