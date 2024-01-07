<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class FAQsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FAQ::get();
        return view('backend.faqs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.faqs.create');
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
            'faqs_en' => 'required',
            'faqs_km' => 'required',
        ],[
            'faqs_en.required' => __('app.faqs_en').' '.__('app.required'),
            'faqs_km.required' => __('app.faqs_km').' '.__('app.required'),
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $faq = new FAQ();
        $faq->faq = $request->faqs_en;
        $faq->faq_km = $request->faqs_km;
        $faq->created_by = Auth::user()->id;
        $faq->updated_by = Auth::user()->id;
        $faq->save();

        return redirect('/faqs')->with('success', __('app.faqs_page') . __('app.label_created_successfully'));
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = FAQ::find($id);
        return view('backend.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'faqs_en' => 'required',
            'faqs_km' => 'required',
        ],[
            'faqs_en.required' => __('app.faqs_en').' '.__('app.required'),
            'faqs_km.required' => __('app.faqs_km').' '.__('app.required'),
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $faq = FAQ::find($id);
        $faq->faq = $request->faqs_en;
        $faq->faq_km = $request->faqs_km;
        $faq->updated_by = Auth::user()->id;
        $faq->save();

        return redirect('/faqs')->with('success', __('app.faqs_page') . __('app.label_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = FAQ::find($id);
        $faq->delete();

        return redirect('/faqs')->with('danger', __('app.faqs_page') . __('app.label_deleted_successfully'));
    }
}
