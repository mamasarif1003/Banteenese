<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PesananDetail;
use Carbon\Carbon;
use App\Province;
use App\Product;
use App\Pesanan;
use App\Address;
use App\City;
use Auth;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //menampilkan keranjang
    public function index()
    {
        //
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $address = Address::where('user_id',Auth::user()->id)->first();
        
        if(empty($pesanan)){
            return view('account.keranjang-kosong', compact('address'));
        }
        
        $cek_keranjang = PesananDetail::where('pesanan_id', $pesanan->id)->first();        
        $cekBarang = PesananDetail::where('user_id', Auth::user()->id)->where('pesanan_id',$pesanan->id)->first();
        
        if(empty($cekBarang)){
            return view('account.keranjang-kosong', compact('address'));
        }
        
        if(!empty($pesanan))
        {
            $pesanand = PesananDetail::where('pesanan_id', $pesanan->id)->first();
            $keranjang = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            $product = Product::where('id',$pesanand->barang_id)->get();
        }
        if(empty($cek_keranjang)){
            return view('account.keranjang-kosong', compact('address'));
        }
        
        return view('account.keranjang',compact('keranjang','pesanan','address','product'));
    }

    //menampilkan detail pesanan
    public function pesanandetail($id)
    {
        //
        $address = Address::where('user_id',Auth::user()->id)->with(['province', 'city'])->get();
        $city = City::get();
        $pesanan_utama = Pesanan::where('user_id', Auth::user()->id)->where('id',$id)->first();
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('id',$id)->get();
        $pesanand = PesananDetail::where('user_id', Auth::user()->id)
            ->where('pesanan_id',$pesanan_utama->id)
            ->get();
        
        return view('account.order-detail',compact('address','city','pesanan','pesanand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //
        $barang = Product::where('id', $id)->first();
        $date = Carbon::now();
        
        //cek pesanan
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $address = Address::where('user_id', Auth::user()->id)->first();
        $cek_status_barang = Product::where('id', $id)->where('stock',0)->first();
        
        if(empty($address)){
            return redirect()->back()->with('alamat', 'Anda belum menambahkan Alamat.');
        }
        
        if($cek_status_barang){
            return redirect()->back()->with('habis', 'Stok Produk Sedang Kosong.');
        }
        
        //simpan ke db pesanan
        if(empty($cek_pesanan))
        {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->username = Auth::user()->name;
            $pesanan->address_id = $address->id;
            $pesanan->date = $date;
            $pesanan->status = 0;
            $pesanan->ongkir = 0;
            $pesanan->kurir = 0;
            $pesanan->total_harga = 0;
            $pesanan->pembayaran = 0;
            $pesanan->total_tagihan = 0;
            $pesanan->total_weight = 0;
            $pesanan->code = 0;
            $pesanan->save();
        }
        
        //pesanan detail
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        
        //cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
        
        if(empty($cek_pesanan_detail))
        {
            $pesanan_detail = new PesananDetail;
//            $pesanan_detail->id = Auth::user()->id;
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->user_id = Auth::user()->id;
            $pesanan_detail->photo = $barang->pict;
            $pesanan_detail->item_name = $barang->name;
            $pesanan_detail->price = $barang->price;
            $pesanan_detail->color = $request->color;
            $pesanan_detail->weight = $barang->weight;
            $pesanan_detail->item_total = $request->item_total;
            $pesanan_detail->jumlah_harga = $barang->price*$request->item_total;
            $pesanan_detail->jumlah_weight = $barang->weight*$request->item_total;
            $pesanan_detail->save();
        }else
        {
            $pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
            
            $pesanan_detail->item_total = $pesanan_detail->item_total+$request->item_total;
            
            //harga sekarang
            $harga_pesanan_detail_baru = $barang->price*$request->item_total;
            $weight_pesanan_detail_baru = $barang->weight*$request->item_total;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
            $pesanan_detail->jumlah_weight = $pesanan_detail->jumlah_weight+$weight_pesanan_detail_baru;
            $pesanan_detail->update();
        }
        
        //jumlah total
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan->total_harga = $pesanan->total_harga+$barang->price*$request->item_total;
        $pesanan->total_weight = $pesanan->total_weight+$barang->weight*$request->item_total;
        $pesanan->update();
        
//        dd($pesanan);
//        dd($pesanan_detail);
        return redirect('keranjang')->with('status','Produk berhasil ditambahkan ke keranjang!');
    }
    
    //menghapus orderan
    public function cancel(Request $request,$id)
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)
            ->where('status',1)
            ->where('id',$request->id)
            ->first();
        
        $pesanan->status = 0;
        $pesanan->kurir = 0;
        $pesanan->ongkir = 0;
        $pesanan->total_tagihan = 0;
        $pesanan->save();
        
        return redirect()->back()->with('status', 'Pesanan berhasil dibatalkan!');
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
    public function delete($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->total_harga = $pesanan->total_harga-$pesanan_detail->jumlah_harga;
        $pesanan->total_weight = $pesanan->total_weight-$pesanan_detail->jumlah_weight;
        $pesanan->update();
        
        $pesanan_detail->delete();
        
        return redirect()->back()->with('status','Produk berhasil dihapus!');
    }
}
