<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductSubCategoory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductSubCategooryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategory = ProductSubCategoory::orderBy('code','desc')->get();
        return view('backend.product_sub_category.index', compact('subCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = ProductCategory::orderBy('name','desc')->get();
        return view('backend.product_sub_category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_category' => 'required',
            'code' => 'required',
            'name' => 'required',
            'name_km' => 'required',
        ],[
            'product_category.required' => __('app.product_category').__('app.required'),
            'code.required' => __('app.code').__('app.required'),
            'name.required' => __('app.product_category').__('app.required'),
            'name_km.required' => __('app.product_category_km').__('app.required')
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $productSubCategoory = new ProductSubCategoory();
        $productSubCategoory->product_category_id = $request->product_category;
        $productSubCategoory->code = $request->code;
        $productSubCategoory->name = $request->name;
        $productSubCategoory->name_km = $request->name_km;
        $productSubCategoory->note = $request->note;
        $productSubCategoory->created_by = Auth::user()->id;
        $productSubCategoory->updated_by = Auth::user()->id;
        $productSubCategoory->save();
        
        return redirect('/product-sub-category')->with('success', __('app.product_sub_category').__('app.label_created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSubCategoory  $productSubCategoory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_cat = ProductSubCategoory::find($id);
        return view('backend.product_sub_category.show', compact('sub_cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSubCategoory  $productSubCategoory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ProductCategory::orderBy('name','desc')->get();
        $item = ProductSubCategoory::find($id);
        return view('backend.product_sub_category.edit', compact('item','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductSubCategoory  $productSubCategoory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_category' => 'required',
            'code' => 'required',
            'name' => 'required',
            'name_km' => 'required',
        ],[
            'product_category.required' => __('app.product_category').__('app.required'),
            'code.required' => __('app.code').__('app.required'),
            'name.required' => __('app.product_category').__('app.required'),
            'name_km.required' => __('app.product_sub_category_km').__('app.required')
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $productSubCategoory = ProductSubCategoory::find($id);
        $productSubCategoory->product_category_id = $request->product_category;
        $productSubCategoory->code = $request->code;
        $productSubCategoory->name = $request->name;
        $productSubCategoory->name_km = $request->name_km;
        $productSubCategoory->note = $request->note;
        $productSubCategoory->created_by = Auth::user()->id;
        $productSubCategoory->updated_by = Auth::user()->id;
        $productSubCategoory->save();
        
        return redirect('/product-sub-category')->with('success', __('app.product_sub_category').__('app.label_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSubCategoory  $productSubCategoory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productSubCategoory = ProductSubCategoory::find($id);
        $productSubCategoory->delete();
        
        return redirect('/product-sub-category')->with('success', __('app.product_sub_category').__('app.label_deleted_successfully'));
    }
}
