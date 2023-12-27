<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use App\Models\ItemSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ItemSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ItemSubCategory::orderBy('name','asc')->get();
        return view('backend.item_sub_category.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = ItemCategory::orderBy('name','asc')->get();
        return view('backend.item_sub_category.create', compact('items'));
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
            'item_category' =>'required',
            'name' =>'required',
        ],[
            'item_category.required' => __('app.item_category').__('app.required'),
            'code.required' => __('app.code').__('app.required'),
            'name.required' => __('app.label_name').__('app.required'),
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $itemGroups = new ItemSubCategory();
        $itemGroups->item_category_id = $request->item_category;
        $itemGroups->code = $request->code;
        $itemGroups->name = $request->name;
        $itemGroups->note = $request->note;
        $itemGroups->created_by = Auth::user()->id;
        $itemGroups->updated_by = Auth::user()->id;
        $itemGroups->save();

        return redirect('/item-sub-category')->with('success', __('app.item_sub_category') . __('app.label_created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemSubCategory  $itemSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ItemSubCategory $itemSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemSubCategory  $itemSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = ItemCategory::orderBy('name','asc')->get();
        $item = ItemSubCategory::find($id);
        return view('backend.item_sub_category.edit', compact('items','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemSubCategory  $itemSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'code' =>'required',
            'item_category' =>'required',
            'name' =>'required',
        ],[
            'item_category.required' => __('app.item_category').__('app.required'),
            'code.required' => __('app.code').__('app.required'),
            'name.required' => __('app.label_name').__('app.required'),
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $itemGroups = ItemSubCategory::find($id);
        $itemGroups->item_category_id = $request->item_category;
        $itemGroups->code = $request->code;
        $itemGroups->name = $request->name;
        $itemGroups->note = $request->note;
        $itemGroups->updated_by = Auth::user()->id;
        $itemGroups->save();

        return redirect('/item-sub-category')->with('success', __('app.item_sub_category') . __('app.label_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemSubCategory  $itemSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $item = ItemSubCategory::find($id);
        $item->delete();

        return redirect('/item-sub-category')->with('success', __('app.item_sub_category') . __('app.label_deleted_successfully'));
    }
}
