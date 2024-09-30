<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Product;

class ProdukController extends Controller
{
    public function detail($url)
    {
        $latestp = Product::orderBy('id', 'DESC')->limit(4)->get();
        $productc = Product::where('url',$url)->first();
        $product = Product::where('url',$url)->get();
        $color = Str::of($productc->color)->explode(',');
        $category = Category::all();
        
        return view('produk.detail',compact('latestp','product','color','category'));
    }
}
