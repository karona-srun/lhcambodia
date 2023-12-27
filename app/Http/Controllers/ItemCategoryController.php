<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icategory = ItemCategory::orderBy('name','asc')->get();
        return view('backend.item_category.index', compact('icategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.item_category.create');
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
            'code' =>'required',
            'name' =>'required',
        ],[
            
            'code.required' => __('app.code').__('app.required'),
            'name.required' => __('app.label_name').__('app.required'),
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $itemGroups = new ItemCategory();
        $itemGroups->code = $request->code;
        $itemGroups->name = $request->name;
        $itemGroups->note = $request->remark;
        $itemGroups->updated_by = Auth::user()->id;
        $itemGroups->save();

        return redirect('/item-category')->with('success', __('app.item_category') . __('app.label_created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ItemCategory $itemCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = ItemCategory::find($id);
        return view('backend.item_category.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'code' =>'required',
            'name' =>'required',
        ],[
            
            'code.required' => __('app.code').__('app.required'),
            'name.required' => __('app.label_name').__('app.required'),
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $itemGroups = ItemCategory::find($id);
        $itemGroups->code = $request->code;
        $itemGroups->name = $request->name;
        $itemGroups->note = $request->remark;
        $itemGroups->updated_by = Auth::user()->id;
        $itemGroups->save();

        return redirect('/item-category')->with('success', __('app.item_category') . __('app.label_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemCategory = ItemCategory::find($id);
        $itemCategory->delete();

        return redirect('/item-category')->with('danger', __('app.item_category') . __('app.label_deleted_successfully'));
    }
}
