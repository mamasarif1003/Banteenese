<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PesananDetail;
use App\Pesanan;
use App\Province;
use App\Address;
use App\City;
use PDF;

class OrderController extends Controller
{
    public function index()
    {
        $pdf = "cetakPDF";
        $pesanan = Pesanan::where('status','>',0)->orderBy('id', 'DESC')->get();
        return view('admin.order.index',compact('pdf','pesanan'));
    }
    
    public function entry()
    {
        $pdf = "cetakPDF1";
        $pesanan = Pesanan::where('status',1)->orderBy('id', 'DESC')->get();
        return view('admin.order.index',compact('pdf','pesanan'));
    }

    public function process()
    {
        $pdf = "cetakPDF2";
        $pesanan = Pesanan::where('status',2)->orderBy('id', 'DESC')->get();
        return view('admin.order.index',compact('pdf','pesanan'));
    }

    public function history()
    {
        $pdf = "cetakPDF3";
        $pesanan = Pesanan::where('status',3)->orderBy('id', 'DESC')->get();
        return view('admin.order.index',compact('pdf','pesanan'));
    }
    
    public function cetakPDF()
    {
        $order = Pesanan::where('status', '>', 0)->get();
 
    	$pdf = PDF::loadview('admin/order_pdf',compact('order'));
    	return $pdf->download('laporan-order.pdf');
    }
    
    public function cetakPDF1()
    {
        $order = Pesanan::where('status', 1)->get();
 
    	$pdf = PDF::loadview('admin/order_pdf',compact('order'));
    	return $pdf->download('laporan-order.pdf');
    }
    
    public function cetakPDF2()
    {
        $order = Pesanan::where('status', 2)->get();
 
    	$pdf = PDF::loadview('admin/order_pdf',compact('order'));
    	return $pdf->download('laporan-order.pdf');
    }
    
    public function cetakPDF3()
    {
        $order = Pesanan::where('status', 3)->get();
 
    	$pdf = PDF::loadview('admin/order_pdf',compact('order'));
    	return $pdf->download('laporan-order.pdf');
    }
    
    public function show($id)
    {
        //
        $pesanan_utama = Pesanan::where('id',$id)->first();
        
        $address = Address::where('id',$pesanan_utama->address_id)
            ->with(['province', 'city'])->get();
        $city = City::get();
        
        $pesanan = Pesanan::where('id',$id)->get();
        $tanggal = $pesanan_utama->date->format('d/m/Y');
        $pesanand = PesananDetail::where('pesanan_id',$pesanan_utama->id)->get();
        
        return view('admin.order.detail',compact('address','city','pesanan','pesanand','tanggal'));
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
        $pesanan = Pesanan::where('id',$id)->get();
        
        return view('admin.order.edit',compact('pesanan'));
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
        $pesanan = Pesanan::where('id',$id)->first();
        $pesanan->status = $request->status;
        $pesanan->receipt_number = $request->receipt_number;
        $pesanan->save();

        return redirect()->back()->with('status', 'Pesanan Berhasil Diperbarui!');
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
        $pesanan = Pesanan::where('id',$id)->first();
        PesananDetail::where('pesanan_id',$pesanan->id)->delete();
        $pesanan->delete();
        
        return redirect()->back()->with('status', 'Pesanan Berhasil Dihapus!');
    }
}
