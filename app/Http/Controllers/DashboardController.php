<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PesananDetail;
use App\Province;
use App\Pesanan;
use App\Product;
use App\Address;
use App\City;
use Auth;

class DashboardController extends Controller
{
    //menampilkan dashboard member
    public function index()
    {
        $address = Address::where('user_id',Auth::user()->id)->with(['province', 'city'])->get();
        $city = City::get();
        $pesanan = Pesanan::where('user_id',Auth::user()->id)
            ->where('status','>',0)
            ->orderBy('id', 'DESC')
            ->limit(3)->get();
        
        return view('account.dashboard',compact('address','city','pesanan'));
    }
    
    //menampilkan history pesanan
    public function order()
    {
        $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status','>',0)->first();
        
        if(empty($pesanan))
        {
            return view('account.history-kosong');
        }
        
//        $pesanand2 = PesananDetail::where('pesanan_id', $pesanan->id)->first();
//        $pesanand = PesananDetail::where('pesanan_id', $pesanan->id)->get();
//        $product = Product::where('id',$pesanand2->barang_id)->get();
        
        $pesanan2 = Pesanan::latest()->where('user_id',Auth::user()->id)->where('status','>',0)->get();
        
        return view('account.history',compact('pesanan2'));
    }
}
