<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Province;
use App\Address;
use App\City;
use App\User;
use Auth;

class UserController extends Controller
{
    //daftar user
    public function index()
    {
        $user = User::all();
        return view('admin.user.user',compact('user'));
    }
    
    //hapus user
    public function delete($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()->with('status', 'User Berhasil Dihapus!');
    }
    
    //detail user
    public function detail($id)
    {
        $address = Address::where('user_id',$id)->with(['province', 'city'])->get();
        $city = City::get();
        $user = User::where('id',$id)->get();
        return view('admin.user.detail',compact('address','city','user'));
    }
}
