<?php

namespace App\Http\Controllers;

use App\Models\PhotoGalleries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PhotoGalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photoGalleries = PhotoGalleries::get();
        return view('backend.photo_galleries.index', compact('photoGalleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.photo_galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = 'temp.png';
        if ($request->hasFile('image')) {
            $imageName = 'photo_gallery_' . time() . rand(1, 99999) . '.' . $request->image->getClientOriginalExtension();
            $imageName = str_replace(' ', '_', $imageName);
            $request->image->move(public_path('photo_gallery'), $imageName);
        }

        $photoGalleries = new PhotoGalleries();
        $photoGalleries->caption = $request->caption;
        $photoGalleries->image = $imageName;
        $photoGalleries->status = 1;
        $photoGalleries->body = $request->body;
        $photoGalleries->created_by = Auth::user()->id;
        $photoGalleries->updated_by = Auth::user()->id;
        $photoGalleries->save();

        return redirect('/photo-galleries')->with('success', __('app.photo_galleries_page').__('app.label_created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhotoGalleries  $photoGalleries
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photoGalleries = PhotoGalleries::find($id);
        return response()->json($photoGalleries);
    }

    public function toggleStatus($id)
    {
        $photoGalleries = PhotoGalleries::find($id);
        $photoGalleries->status = $photoGalleries->status == 1 ? 0 : 1; // published
        $photoGalleries->save();

        return redirect('/photo-galleries')->with('success', __('app.photo_galleries_page').__('app.label_updated_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhotoGalleries  $photoGalleries
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = PhotoGalleries::find($id);
        
        return view('backend.photo_galleries.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhotoGalleries  $photoGalleries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $photoGalleries = PhotoGalleries::find($id);
        $imageName = 'temp.png';

        if ($request->photo) {
            if ($request->hasFile('photo')) {
                File::delete('products/' . $photoGalleries->photo);
                $imageName = 'product_' . time() . rand(1, 99999) . '.' . $request->photo->getClientOriginalExtension();
                $imageName = str_replace(' ', '_', $imageName);
                $request->photo->move(public_path('products'), $imageName);
                $photoGalleries->photo = $imageName;
            }
        }

        $photoGalleries->body = $request->body;
        $photoGalleries->caption = $request->caption;
        $photoGalleries->updated_by = Auth::user()->id;
        $photoGalleries->save();

        return redirect('/photo-galleries')->with('success', __('app.photo_galleries_page').__('app.label_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhotoGalleries  $photoGalleries
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slideshow = PhotoGalleries::find($id);
        $slideshow->delete();

        return redirect('/photo-galleries')->with('danger', __('app.photo_galleries_page').__('app.label_deleted_successfully'));
    }
}
