<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::orderBy('id','desc')->get();
        return view('backend.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.abouts.create');
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
            'name' => 'required',
            'content' => 'required',
            'name_en' => 'required',
            'content_en' => 'required',
        ],[
            'name.required' => __('app.about_title_km').__('app.required'),
            'content.required' => __('app.about_content_km').__('app.required'),
            'name_en.required' => __('app.about_title_en').__('app.required'),
            'content_en.required' => __('app.about_content_en').__('app.required'),
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $about = new About();
        $about->name = $request->name;
        $about->content = $request->content;
        $about->name_en = $request->name_en;
        $about->content_en = $request->content_en;
        $about->created_by = Auth::user()->id;
        $about->updated_by = Auth::user()->id;
        $about->save();

        return redirect('/abouts')->with('success', __('app.label_content') . __('app.label_created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::find($id);
        return view('backend.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required',
        ],[
            'name.required' => __('app.label_name').__('app.required'),
            'content.required' => __('app.label_content').__('app.required'),
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $about = About::find($id);
        $about->name = $request->name;
        $about->content = $request->content;
        $about->name_en = $request->name_en;
        $about->content_en = $request->content_en;
        $about->updated_by = Auth::user()->id;
        $about->save();

        return redirect('/abouts')->with('success', __('app.label_content') . __('app.label_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        $about->delete();
        return redirect('/abouts')->with('danger', __('app.label_content') . __('app.label_deleted_successfully'));
    }
}
