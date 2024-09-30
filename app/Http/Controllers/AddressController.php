<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\City;
use App\Address;
use Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $address = Address::where('user_id',Auth::user()->id)->get();
        $address = Address::where('user_id',Auth::user()->id)->with(['province', 'city'])->get();
        $city = City::get();
        
        return view('account.address.index',compact('address','city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $address = Address::where('user_id',Auth::user()->id)->get();
        $provinces = Province::pluck('title', 'province_id');
        
        return view('account.address.form',compact('address', 'provinces'));
    }
    
    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('title', 'city_id');
        return json_encode($city);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $address = Address::where('user_id',Auth::user()->id)->first();
        
        if(!empty($address))
        {
            return redirect('/address')->with('alert', 'Anda sudah mengisi Alamat.');
        }
        
        if(empty($address))
        {
            $address = new Address;
            $address->user_id = Auth::user()->id;
            $address->name = $request->name;
            $address->address = $request->address;
            $address->province_id = $request->province_destination;
            $address->city_id = $request->city_destination;
            $address->post_code = $request->post_code;
            $address->no_wa = $request->no_wa;
            $address->save();
        }
        
//        dd($address);
        return redirect('/address')->with('status', 'Alamat Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
        $address = Address::where('user_id',Auth::user()->id)->get();
        $provinces = Province::pluck('title', 'province_id');
        
        return view('account.address.edit',compact('address','provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $address = Address::where('user_id', Auth::user()->id)->first();
        
        $address->name = $request->name;
        $address->address = $request->address;
        $address->province_id = $request->province_destination;
        $address->city_id = $request->city_destination;
        $address->post_code = $request->post_code;
        $address->no_wa = $request->no_wa;
        $address->update();
        
        return redirect('address')->with('status', 'Alamat berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Address::where('id',$id)->delete();
        
        return redirect()->back()->with('status', 'Alamat Berhasil Dihapus!');
    }
}
