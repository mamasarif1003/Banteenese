<?php

namespace App\Http\Controllers;

use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Http\Request;
use App\PesananDetail;
use Carbon\Carbon;
use App\Province;
use App\Pesanan;
use App\Address;
use App\Courier;
use App\City;
use Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $cek_pesanan = Pesanan::where('user_id',Auth::user()->id)->where('ongkir',0)->first();
        
        if(!empty($cek_pesanan))
        {
            return redirect()->back();
        }
        
        $barang = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        $address = Address::where('user_id',Auth::user()->id)->with(['province', 'city'])->get();
        $city = City::get();
        
        return view('account.checkout',compact('pesanan','barang','address','city'));
    }
    
    //update ongkir
    public function updateongkir(Request $request)
    {
        //
        $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $pesanan->ongkir = $request->ongkir;
        $pesanan->total_tagihan = $request->ongkir+$pesanan->total_harga;
        $pesanan->save();
        
        return redirect('checkout');
    }

    //update pembayaran
    public function updatebayar(Request $request)
    {
        //
        $date = Carbon::now();
        
        $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $pesanan->date = $date;
        $pesanan->pembayaran = $request->pembayaran;
        $pesanan->note = $request->note;
        $pesanan->code = $request->code;
        $pesanan->status = 1;
        $pesanan->save();
        
        return redirect('history')->with('status','Pesanan Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function submit(Request $request)
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $keranjang = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin, // ID kota/kabupaten asal
            'destination'   => $request->city_destination, // ID kota/kabupaten tujuan
            'weight'        => $request->weight, // berat barang dalam gram
            'courier'       => $request->kurir // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();
        
        $pesanan->kurir = $request->kurir;
        $pesanan->save();

        $layanan = $cost[0]['costs'];
        
//        dd($layanan);
        return view('account.ongkir',compact('pesanan','keranjang','layanan'));
    }
}
