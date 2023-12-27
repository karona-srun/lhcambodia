<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Customer;
use App\Models\Product;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchaseOrders = PurchaseOrder::orderBy('id', 'desc')->get();
        $PODaily = PurchaseOrder::createdToday()->count();
        $POMonthly = PurchaseOrder::createdThisMonth()->count();
        return view('backend.purchase_order.index', compact('PODaily','POMonthly','purchaseOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::orderBy('customer_name', 'desc')->get();
        return view('backend.purchase_order.create', compact('customer'));
    }

    public function POGenerate()
    {
        $POCount = PurchaseOrder::count();
        $nextPONumber = $POCount + 1;
        $invoiceNo = 'PO-'.date('ymd'). str_pad($nextPONumber, 6, '0', STR_PAD_LEFT);
        return $invoiceNo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'customer' =>'required',
            'customer_phone' =>'required',
            'customer_address' =>'required',
            'ship_name' => 'required',
            'ship_phone' => 'required',
            'ship_address' => 'required',
            'vendor_name' => 'required',
            'vendor_phone' => 'required',
            'vendor_address' => 'required',
        ],[
            'customer.required' => __('app.customer').__('app.required'),
            'customer_phone.required' => __('app.phone').__('app.required'),
            'customer_address.required' => __('app.label_address').__('app.required'),
            'ship_name.required' => __('app.label_name').__('app.required'),
            'ship_phone.required' => __('app.phone').__('app.required'),
            'ship_address.requi1red' => __('label_address').__('app.required'),
            'vendor_name.required' => __('app.label_name').__('app.required'),
            'vendor_phone.required' => __('app.phone').__('app.required'),
            'vendor_addre1ss.required' => __('label_address').__('app.required'),
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        return view('backend.purchase_order.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    public function exportExcel()
    {
        $file_name = 'PurchaseOrder_' . date('d_m_y_H_i_s') . '.xlsx';

        $data = PurchaseOrder::all();

        $PO = $data->map(function ($data) {
            return [
                'id' => $data->id,
                'customer_name' => $data->customer->customer_name ?? 'N/A',
                'sale_order' => $data->sale_order,
                'sale_order_date' => $data->sale_order_date,
                'expected_shipment_date' => $data->expected_shipment_date,
                'warehouse' => $data->warehouse,
                'sale_person' => $data->sale_person,
                'delivery_method' => $data->delivery_method,
                'created_at' => $data->created_at,
                'updated_at' => $data->updated_at
            ];
        });

        $heading = [
            __('app.table_no') ,
            __('app.customer_name') ,
            __('app.sale_order') ,
            __('app.sale_order_date') ,
            __('app.expected_shipment_date') ,
            __('app.warehouse_name') ,
            __('app.sale_person') ,
            __('app.delivery_method') ,
            __('app.created_at') ,
            __('app.updated_at') ,
        ];

        return Helpers::exportExcel($PO, $heading, $file_name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }
}
