<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Attachment;
use App\Models\FAQ;
use App\Models\PhotoGalleries;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategoory;
use App\Models\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $productes = Product::where('classify','product_for_sale')->limit(15)->get();
        $producteRandom = Product::where('classify','product_for_sale')->inRandomOrder()->limit(10)->get();
        $productCategory = ProductCategory::get();
        $productSubCategory = ProductSubCategoory::get();
        $slide = Slideshow::where('status',0)->get();
        return view('frontend.index', compact('productes','producteRandom','productCategory','productSubCategory','slide'));
    }

    public function getProduct($id)
    {
        $product = Product::findOrFail($id);
        $productes = Product::inRandomOrder()->limit(10)->get();
        $productCategory = ProductCategory::get();
        $attachments = Attachment::where(['type_id'=>$id,'type'=>'product'])->get();

        $data = [
            '/' => app()->getLocale() == "en" ? $product->productCategory->name : $product->productCategory->name_km,
            '/#' => app()->getLocale() == "en" ? $product->subCategory->name : $product->subCategory->name_km
        ];
        return view('frontend.details', compact('product','productes','attachments','productCategory','data'));
    }

    public function productsDetailsAddCart($id)
    {
        $product = Product::findOrFail($id);
        $productes = Product::inRandomOrder()->limit(10)->get();
        $productCategory = ProductCategory::get();
        $attachments = Attachment::where(['type_id'=>$id,'type'=>'product'])->get();

        $data = [
            '/' => app()->getLocale() == "en" ? $product->productCategory->name : $product->productCategory->name_km,
            '/#' => app()->getLocale() == "en" ? $product->subCategory->name : $product->subCategory->name_km
        ];
        return view('frontend.add_cart', compact('product','productes','attachments','productCategory','data'));
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

    public function decorProductFilterCategory($slug1, $slug2, $id) 
    {
        $data = [
            '/' => __('app.decor_product_page'),
            $slug1 => ucwords(str_replace('-', ' ', $slug1)),
            $slug2 =>  ucwords(str_replace('-', ' ', $slug2))
        ];
        $productCategory = ProductCategory::get();
        $product = Product::where('product_sub_category_id', $id)->get();

        return view('frontend.pages.decor_product_filter_category', compact('data','productCategory','product'));
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
        $data = ['contact-us' => __('app.contact_us_page')];
        return view('frontend.pages.contact_us.visit_us', compact('data'));
    }

    public function photoGallery() 
    {
        $data = ['photo-gallery' => __('app.photo_galleries_page')];
        $photoGallery = PhotoGalleries::orderBy('id','asc')->where('status',1)->get();

        return view('frontend.pages.our_project.photo_gallery', compact('photoGallery', 'data'));    
    }

    public function photoGalleryDetails($id)
    {
        $photoGallery = PhotoGalleries::find($id);
        $data = [
            'photo-gallery' => __('app.photo_galleries_page'),
            'photo-gallery/details/'.$id => $photoGallery->caption
        ];
        $photos = PhotoGalleries::orderBy('id','asc')->where('status',1)->get();

        return view('frontend.pages.our_project.photo_gallery_details', compact('photoGallery', 'data','photos')); 
    }

    public  function faq()
    {
        $data = ['faq' => __('app.faq_page')];
        $faqs = FAQ::orderBy('id','asc')->get();
        return view('frontend.pages.faq', compact('data', 'faqs'));
    }
}
