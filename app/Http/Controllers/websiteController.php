<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class websiteController extends Controller
{
    public function index(){
        $data['route'] = 'index_page';
        $data['categories'] = Category::where('is_popular',1)->select('id','meta_title','meta_description','image','slug')->get();
        $data['products'] = Product::where('trend',1)->select('id','meta_title','meta_description','price','selling_price','image','slug','category_id')->get();
        return view('website.index',$data);
    }

    public function getCategories(){
        $data['route'] = 'categories_page';
        $data['categories'] = Category::where('is_showing',1)->get();
        return view('website.categories',$data);
    }

    public function getCategoryBySlug($slug){

        if (Category::where('slug',$slug)->exists()){
            $data['route']='categories_page';
            $data['category'] = Category::with('products')->where('slug',$slug)->where('is_showing',1)->first();
            return view('website.category',$data);

        }else{
            return redirect('/')->with('error','there is wrong slug');
        }

    }

    public function getProductBySlug($category_product ,$product_category){

        if(Category::where('slug',$category_product)->exists()){
            if(Product::where('slug',$product_category)->exists()){
                $data['route']='categories_page';
                $data['product'] = Product::with('category')->where('slug',$product_category)->first();
                // to get keywords as array Form :
                $data['keywords'] = explode(',', $data['product']->meta_keywords);
                return view('website.product',$data);
            }else{
                return redirect('/')->with('error','Wrong Product');
            }
        }else{
            return redirect('/')->with('error','Wrong category');
        }

    }
}
