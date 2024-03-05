<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::orderBy('id','desc')->get();
        return view('backend.contacts.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'content' => 'required',
        ],[
            'fullname.required' => __('app.label_fullname').__('app.required'),
            'email.required' => __('app.label_email').__('app.required'),
            'phone.required' => __('app.label_phone').__('app.required'),
            'content.required' => __('app.label_content').__('app.required'),
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $contact = new Contact();
        $contact->fullname = $request->fullname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->you_are = $request->you_are;
        $contact->content = $request->content;
        if($request->product_id){
            $contact->product_id = $request->product_id;
            $contact->import_type = json_encode($request->import,true);
        }
        $contact->save();

        if($request->product_id){
            return redirect()->back()->with('contact', __('app.contact_us_page').__('app.label_created_successfully'));
        }

        return redirect('/contact-us')->with('contact', __('app.contact_us_page').__('app.label_created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('backend.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->remark = $request->remark;
        $contact->response_status = $request->response_status;
        $contact->replied_at = $request->replied_at;
        $contact->replied_by = Auth::user()->id;
        $contact->created_by = Auth::user()->id;
        $contact->updated_by = Auth::user()->id;
        $contact->save();

        return redirect('/contacts')->with('success', __('app.content_page').__('app.label_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(    $id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/contacts')->with('danger', __('app.content_page').__('app.label_deleted_successfully'));
    }
}
