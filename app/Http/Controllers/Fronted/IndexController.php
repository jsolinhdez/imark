<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){
        $banners = Banner::where(['status'=>'active','condition'=>'banner'])->orderBy('id','DESC')->limit(4)->get();
        $categories = Category::where(['status'=>'active','is_parent'=>1])->orderBy('id','DESC')->limit(3)->get();

        return view('frontend.index',compact(['banners','categories']));
    }

    public function productCategory($slug){
        $categories = Category::with('products')->where('slug',$slug)->first();
        return view('frontend.pages.product-category',compact(['categories']));
    }

    //Product detail
    public function productDetail($slug){
        $product = Product::where('slug',$slug)->first();
        if ($product){
            return view('frontend.pages.product-detail',compact(['product']));
        }
    }




}
