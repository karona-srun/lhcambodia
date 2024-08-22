<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payslip</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.css') }}">
    
    <style media="screen">
        .noPrint {
            display: block;
        }

        .yesPrint {
            display: block !important;
        }
        .bg-blue {
            background-color: #007bff !important;
        }
        .table thead th {
            padding: 10px 10px !important;
        }
    </style>
    <style>
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
        .table thead th {
            padding: 10px 10px !important;
        }
        @media print {
            html,
            body {
                padding: 2mm;
            }
            table {
                border: 0px !important;
            }
            .table, .bg-blue {
                background-color: #007bff !important;
            }
        }
    </style>
</head>
<body>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">

                <div class="card-body" id="printarea">
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h4 class="text-center">Payslip</h4>
                                <p class="text-center">Payslip period {{ date('d/m/Y', strtotime($payroll->start_date)) }} - {{ date('d/m/Y', strtotime($payroll->end_date)) }}</p>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-3">
                                <p>{{ __('app.table_staff_name') }}
                                    <br>{{ __('app.staff_id') }}
                                    <br>{{ __('app.base_salary') }}
                                </br>
                            </div>
                            <div class="col-md-3">
                                <p>: {{ $staff->full_name_kh }}
                                    <br>: {{ $staff->id }}
                                    <br>: ${{ $staff->base_salary }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p><br>{{ __('app.department')}}
                                <br>{{ __('app.position') }}</p>
                            </div>
                            <div class="col-md-3">
                                <p><br>: {{ $staff->departments->name }}
                                <br>: {{ $staff->positions->name }}</p>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <table id="myAttendance datatable" class="table" style="">
                                    <thead class="bg-blue text-center">
                                        <tr>
                                            <th class="text-left">ផ្នែកបូក</th>
                                            <th>ឯកតា</th>
                                            <th>ចំនួន</th>
                                            <th>សរុប</th>
                                            <th class="text-left">ផ្នែកកាត់</th>
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
                                                <p>Claim</p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                            </td>
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
                                                <p>ថែមម៉ោង (h)</p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                            </td>
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
                                                <p>ផ្សេងៗ</p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                            </td>
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
                                                <p>ប្រាក់ឧបត្តម្ភ</p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                            </td>
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
                                                <p>ប្រាក់បំណាច់ឆ្នាំ</p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" name="cliam" id="claim" class="form-control" value="0">
                                            </td>
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
                                                <p>សរុបនៃការបន្ថែម</p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" name="cliam" id="claim" class="form-control" value="${{ $staff->base_salary }}">
                                            </td>
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
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>សរុបនៃការកាត់</td>
                                            <td colspan="3">
                                                <input type="text" name="cliam" readonly id="claim" class="form-control" value="0">
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="bg-warning">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>ចំនួនសរុបចុងក្រោយ</td>
                                        <td colspan="3">
                                            <input type="text" name="cliam" readonly id="claim" class="form-control" value="0">
                                        </td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-5">
                            <div class="col-md-4">
                                <p class="text-center">_____________________<br>Issued HR & Amind Dept.</p>
                            </div>
                            <div class="col-md-4 justify-content-center text-center">
                                <p>_____________________<br>Employee Signture</p>
                            </div>
                            <div class="col-md-4 justify-content-end text-right">
                                <p class="text-center">_____________________<br>Approved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            window.print();
        });
    </script>
    
</body>
</html>