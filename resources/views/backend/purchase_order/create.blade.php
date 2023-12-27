@extends('layouts.master')

@section('title-page', __('app.create_purchase_order'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('app.create_purchase_order') }}</h3>
                    <div class="card-tools">
                        @can('WorkPlace Create')
                            <a href="{{ url('purchase-order') }}" class="btn btn-primary"> <i class=" fas fa-list"></i>
                                {{ __('app.btn_back') }}</a>
                        @endcan
                    </div>
                </div>
                <form action="{{ url('purchase-order') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <p class=" bg-primary rounded p-2">
                            <i class="fas fa-address-book"></i> {{ __('app.purchase_bill') }}
                        </p>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>{{ __('app.customer_name') }} <small class="text-red">*</small></label>
                                    <select name="customer" class="form-control select2 select2-hidden-accessible customer"
                                        style="width: 100%">
                                        @foreach ($customer as $item)
                                            <option value="{{ $item->id }}"
                                                data-customer-address="{{ $item->customer_address }}"
                                                data-customer-phone="{{ $item->customer_phone }}">
                                                {{ $item->customer_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('customer'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('customer') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>{{ __('app.phone') }}</label>
                                    <input type="text" name="customer_phone" class="form-control customer_phone"
                                        value="{{ old('customer_phone') }}">
                                    @if ($errors->has('customer_phone'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('customer_phone') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('app.label_address') }}</label>
                                    <input type="text" name="customer_address" class="form-control customer_address"
                                        value="{{ old('customer_address') }}">
                                    @if ($errors->has('customer_address'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('customer_address') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <p class="bg-primary rounded p-2"> <i class="fas fa-dolly-flatbed"></i>
                            {{ __('app.purchase_ship') }}
                        </p>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>{{ __('app.label_name') }}</label>
                                    <input type="text" name="ship_name" class="form-control ship_name"
                                        value="{{ old('ship_name') }}">
                                    @if ($errors->has('ship_name'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('ship_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>{{ __('app.phone') }}</label>
                                    <input type="text" name="ship_phone" class="form-control ship_phone"
                                        value="{{ old('ship_phone') }}">
                                    @if ($errors->has('ship_phone'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('ship_phone') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('app.label_address') }}</label>
                                    <input type="text" name="ship_address" class="form-control ship_address"
                                        value="{{ old('ship_address') }}">
                                    @if ($errors->has('ship_address'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('ship_address') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <p class=" bg-primary rounded p-2">
                            <i class="fas fa-store-alt"></i> {{ __('app.purchase_vendor') }}
                        </p>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>{{ __('app.label_name') }}</label>
                                    <input type="text" name="vendor_name" class="form-control vendor_name"
                                        value="{{ old('vendor_name') }}">
                                        @if ($errors->has('vendor_name'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('vendor_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>{{ __('app.phone') }}</label>
                                    <input type="text" name="vendor_phone" class="form-control vendor_phone"
                                        value="{{ old('vendor_phone') }}">
                                        @if ($errors->has('vendor_phone'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('vendor_phone') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('app.label_address') }}</label>
                                    <input type="text" name="vendor_address" class="form-control vendor_address"
                                        value="{{ old('vendor_address') }}">
                                        @if ($errors->has('vendor_address'))
                                        <div class="error text-danger text-sm mt-1">
                                            {{ $errors->first('vendor_address') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <p class=" bg-primary rounded p-2">
                            <i class="fas fa-store-alt"></i> {{ __('app.product') }}
                        </p>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>{{ __('app.label_description') }}</th>
                                                <th>{{ __('app.label_qty') }}</th>
                                                <th>{{ __('app.label_price') }}</th>
                                                <th>{{ __('app.label_amount') }}</th>
                                                <th>
                                                    <button type="button" class="cloneBtn btn btn-primary"><i
                                                            class="fas fa-plus"></i></button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" name="product[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" name="description[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="qty[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" name="price[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" name="amount[]" class="form-control">
                                                </td>
                                                <td>
                                                    <button type="button" class="removeBtn  btn btn-danger"><i
                                                            class="fas fa-minus"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"> <i class="far fa-save"></i>
                                {{ __('app.btn_save') }}</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').on('click', '.cloneBtn', function() {
                var clonedRow1 = $('#myTable tbody tr').clone();
                clonedRow1.find('input[type="text"]').val('');
                $('#myTable').append(clonedRow1);
            });

            $('#myTable').on('click', '.removeBtn', function() {
                $(this).closest('tr').remove(); // Removing the clicked row
            });
        });
    </script>
@endsection
