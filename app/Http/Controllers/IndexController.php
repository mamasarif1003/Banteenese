<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class IndexController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('id', 'DESC')->paginate(8);
        return view('index',compact('product'));
    }
    
    public function category($slug)
    {
        //
        $category = Category::where('slug',$slug)->first();
        $product = Product::where('category',$category->category)->orderBy('id', 'DESC')->paginate(8);
        
        return view('index',compact('product'));
    }
}
