<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $color = Color::orderBy('id', 'DESC')->get();
        return view('admin.color.form',compact('color'));
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
        $dataValid = $request->validate([
            'color' => 'required|unique:colors|max:255',
        ],
        [
            'color.required' => 'Nama Warna harus di isi',
            'color.unique' => 'Nama Warna sudah ada',
        ]);
        
        $color = new Color;
        $color->color = $request->color;
        $color->slug = Str::slug($request->color);
        $color->save();
        
        return redirect()->back()->with('status', 'Warna Berhasil Ditambahkan!');
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
        $color = Color::where('id',$id)->get();
        
        return view('admin.color.edit',compact('color'));
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
        $color = Color::where('id',$id)->first();
        $color->color = $request->color;
        $color->slug = Str::slug($request->color);
        $color->save();

        return redirect('color/create')->with('status', 'Warna Berhasil Diperbarui!');
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
        Color::where('id',$id)->delete();
        
        return redirect()->back()->with('status', 'Warna Berhasil Dihapus!');
    }
}
