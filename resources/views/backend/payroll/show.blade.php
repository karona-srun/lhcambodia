@extends('layouts.master')

@section('title-page', __('app.payroll'))

@section('css')
    <style media="screen">
        .noPrint {
            display: block;
        }

        .yesPrint {
            display: block !important;
        }
    </style>
    <style media="print">
        .noPrint {
            display: none;
        }

        .yesPrint {
            display: block !important;
        }

        .card {
            margin-top: 3rem;
            border: 0px solid #ffffff !important;
        }

        .card-title,
        .card-tools {
            display: none !important;
        }

        .title {
            display: block;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="{{ url('payroll/summary', $payroll->id )}}" class="btn  btn-outline-primary"> <i class="fas fa-print"></i>
                            {{ __('app.label_summary') }} </a>
                        <button type="button" class="btn  btn-outline-primary btn-print"> <i class="fas fa-print"></i>
                            {{ __('app.btn_print') }} </button>
                        <a href="{{ url('payroll') }}" class="btn  btn-primary"> <i class=" fas fa-list"></i>
                            {{ __('app.label_list') }} </a>
                </div>

                <div class="card-body" id="printarea">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h4 class="text-center">Payslip</h4>
                                <p class="text-center">Payslip period {{ date('d/m/Y', strtotime($payroll->start_date)) }} - {{ date('d/m/Y', strtotime($payroll->end_date)) }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <p>{{ __('app.table_staff_name') }}
                                    <br>{{ __('app.staff_id') }}
                                    <br>{{ __('app.base_salary') }}
                                </br>
                            </div>
                            <div class="col-md-3">
                                <p>{{ $staff->full_name_kh }}
                                    <br>{{ $staff->id }}
                                    <br>${{ $staff->base_salary }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p></p>
                                <p>{{ __('app.department')}}
                                    <br>{{ __('app.position') }}</p>
                            </div>
                            <div class="col-md-3">
                                <p></p>
                                <p>{{ $staff->departments->name }}
                                    <br>{{ $staff->positions->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table id="myAttendance" class="table" style="">
                                    <thead class="bg-blue text-center">
                                        <tr>
                                            <th>ផ្នែកបូក</th>
                                            <th>ឯកតា</th>
                                            <th>ចំនួន</th>
                                            <th>សរុប</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p>Auctual Rate</p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <p>${{ $staff->base_salary }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Claim</p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>ថែមម៉ោង (h)</p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>ផ្សេងៗ</p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>ប្រាក់ឧបត្តម្ភ</p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>ប្រាក់បំណាច់ឆ្នាំ</p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>សរុបនៃការបន្ថែម</p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" name="cliam" id="claim" class="form-control" value="${{ $staff->base_salary }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <input type="text" name="cliam" readonly id="claim" class="form-control" value="0">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table id="myAttendance" class="table">
                                    <thead class="bg-blue text-center">
                                        <tr>
                                            <th>ផ្នែកបូក</th>
                                            <th>ឯកតា</th>
                                            <th>ចំនួន</th>
                                            <th>សរុប</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p>យឺតម៉ោង</p>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <p>${{ $staff->base_salary }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>ប្រាក់ខ្ចី</p>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>អវត្តមាន (h)</p>
                                                </td>
                                                <td>
                                                    Day
                                                </td>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>បាត់ទិន្នន័យស្កេន</p>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>ផ្សេងៗ</p>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>យឺតម៉ោង 30+ min</p>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Tax Expense</p>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>សរុបនៃការកាត់</strong>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <table id="myAttendance" class="table" style="">
                                    <tbody class="text-center">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <strong>${{ $staff->base_salary }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="myAttendance" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('app.table_no') }}</th>
                                    <th>{{ __('app.table_date') }}</th>
                                    <th>{{ __('app.table_status') }}</th>
                                    <th>{{ __('app.table_checkin') }}</th>
                                    <th>{{ __('app.table_checkout') }}</th>
                                    <th>{{ __('app.num_hour') }}</th>
                                    <th>{{ __('app.label_note') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i => $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ Str::upper($item->status) }}</td>
                                        <td>{{ $item->check_in }}</td>
                                        <td>{{ $item->check_out }}</td>
                                        <td>{{ $item->num_hour }}</td>
                                        <td>{{ $item->note }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="mt-3">{{__('app.label_total_hour_of_working')}}៖​ <span class="total_num_hour">{{ $payroll->total_hour }}</span>
                            {{__('app.label_hour')}}</p>
                        <input type="hidden" name="total_hour" class="total_num_hour_">
                        <p class="mt-3">{{__('app.payroll')}}​៖​ $<span class="total_salary">{{ $payroll->total_salary }}</span> </p>
                        <input type="hidden" name="total_salary" class="total_salary_">
                    </div>
                    <div class="card-body">
                        <div class="row mt-5">
                            <div class="col-md-4">
                                <p class="text-center">_______________________________<br>Issued HR & Amind Dept.</p>
                            </div>
                            <div class="col-md-4 justify-content-center text-center">
                                <p>_______________________________<br>Employee Signture</p>
                            </div>
                            <div class="col-md-4 justify-content-end text-right">
                                <p class="text-center">_______________________________<br>Approved</p>
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

            $(".btn-print").click(function() {
                //             $(".printarea").clone().appendTo("#print-me");
                // //Apply some styles to hide everything else while printing.
                // $("body").addClass("printing");
                // //Print the window.
                // window.print();
                // //Restore the styles.
                // $("body").removeClass("printing");
                // //Clear up the div.
                // $("#print-me").empty();
                $(".printarea").show();
                window.print();

            });


        });
    </script>
@endsection
