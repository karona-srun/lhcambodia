<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Attachment;
use App\Models\FAQ;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slideshow;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $productes = Product::limit(15)->get();
        $producteRandom = Product::inRandomOrder()->limit(10)->get();
        $productCategory = ProductCategory::get();
        $slide = Slideshow::where('status',0)->get();
        return view('frontend.index', compact('productes','producteRandom','productCategory','slide'));
    }

    public function getProduct($id)
    {
        $product = Product::findOrFail($id);
        $productes = Product::inRandomOrder()->limit(10)->get();
        $productCategory = ProductCategory::get();
        $attachments = Attachment::where(['type_id'=>$id,'type'=>'product'])->get();
        return view('frontend.details', compact('product','productes','attachments','productCategory'));
    }

    public function getProductByCategory($id)
    {
        $productes = Product::where('product_category_id',$id)->get();
        $productCategory = ProductCategory::get();
        $producteRandom = Product::inRandomOrder()->limit(10)->get();
        return view('frontend.index', compact('productes','producteRandom','productCategory'));
    }

    public function productList()
    {
        $productes = Product::get();
        $productCategory = ProductCategory::get();
        return view('frontend.product_list', compact('productes','productCategory'));
    }

    public function search(Request $request)
    {
        $productes = Product::where('product_code',$request->q)
        ->orWhere('product_name','LIKE', '%'. $request->q.'%')
        ->orWhere('scale',$request->q)
        ->get();
        $productCategory = ProductCategory::get();

        $producteRandom = Product::inRandomOrder()->limit(10)->get();
        return view('frontend.index', compact('productes','producteRandom','productCategory'));
    }

    public function aboutUs()
    {
        $data = ['about-us' => __('app.about_us_page')];
        $abouts = About::orderBy('id','asc')->get();
        return view('frontend.pages.about_us', compact('data','abouts'));
    }

    public function contactUs()
    {
        $data = ['contact-us' => __('app.about_us_page')];
        return view('frontend.pages.contact_us.visit_us', compact('data'));
    }

    public  function faq()
    {
        $data = ['faq' => __('app.faq_page')];
        $faqs = FAQ::orderBy('id','asc')->get();
        return view('frontend.pages.faq', compact('data', 'faqs'));
    }
}
