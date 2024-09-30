<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pesanan;

class AdminDBController extends Controller
{
    public function index()
    {
        $masuk = Pesanan::where('status',1)->count();
        $proses = Pesanan::where('status',2)->count();
        $selesai = Pesanan::where('status',3)->count();
        
        return view('admin.dashboard',compact('masuk','proses','selesai'));
    }
}
