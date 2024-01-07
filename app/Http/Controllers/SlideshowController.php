<?php

namespace App\Http\Controllers;

use App\Models\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slideshow = Slideshow::get();
        return view('backend.slideshow.index', compact('slideshow'));
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
        $imageName = 'thumb.png';
        if ($request->hasFile('image')) {
            $imageName = 'slideshow_' . time() . rand(1, 99999) . '.' . $request->image->getClientOriginalExtension();
            $imageName = str_replace(' ', '_', $imageName);
            $request->image->move(public_path('slideshows'), $imageName);
        }

        $slideshow = new Slideshow();
        $slideshow->image = $imageName;
        $slideshow->status = 1; // published
        $slideshow->created_by = Auth::user()->id;
        $slideshow->updated_by = Auth::user()->id;
        $slideshow->save();

        return redirect('/slideshow')->with('success', __('app.slideshow').__('app.label_created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slideshow = Slideshow::find($id);
        return response()->json($slideshow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function edit(Slideshow $slideshow)
    {
        //
    }

    public function toggleStatus($id)
    {
        $slideshow = Slideshow::find($id);
        $slideshow->status = $slideshow->status == 1 ? 0 : 1; // published
        $slideshow->save();

        return redirect('/slideshow')->with('success', __('app.slideshow').__('app.label_updated_successfully'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slideshow = Slideshow::find($id);
        $imageName = 'thumb.png';
        if ($request->photo) {
            if ($request->hasFile('image')) {
                File::delete('slideshows/' . $slideshow->image);
                $imageName = 'slideshow_' . time() . rand(1, 99999) . '.' . $request->image->getClientOriginalExtension();
                $imageName = str_replace(' ', '_', $imageName);
                $request->image->move(public_path('slideshows'), $imageName);
                $slideshow->image = $imageName;
            }
        }
        $slideshow->status = 1; // published
        $slideshow->created_by = Auth::user()->id;
        $slideshow->updated_by = Auth::user()->id;
        $slideshow->save();

        return redirect('/slideshow')->with('success', __('app.slideshow').__('app.label_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slideshow  $slideshow
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slideshow = Slideshow::find($id);
        $slideshow->delete();

        return redirect('/slideshow')->with('danger', __('app.slideshow').__('app.label_deleted_successfully'));
    }
}
