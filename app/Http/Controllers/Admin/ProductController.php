<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Product;
use App\Color;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::get();
        $color = Color::get();
        return view('admin.product.form',compact('category','color'));
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
            'pict' => 'required|file|image|mimes:jpeg,png,jpg|max:10000',
            'name' => 'required|unique:products',
            'stock' => 'required',
            'category' => 'required',
            'price' => 'required',
            'color' => 'required',
            'description' => 'required',
            'weight' => 'required',
        ],
        [
            'name.required' => 'Nama Barang harus di isi',
            'name.unique' => 'Nama Barang sudah ada',
            'stock.required' => 'Stok Barang harus di isi',
            'category.required' => 'Kategori Barang harus di isi',
            'price.required' => 'Harga Barang harus di isi',
            'color.required' => 'Warna Barang harus di isi',
            'description.required' => 'Deskripsi Barang harus di isi',
            'weight.required' => 'Berat Barang harus di isi',
        ]);
 
		$file = $request->file('pict');
		$nama_file = time()."_".$file->getClientOriginalName();
 
		$tujuan_upload = 'produk';
		$file->move($tujuan_upload,$nama_file);
 
		$product = Product::create([
            'name' => $request->name,
            'url' => Str::slug($request->name),
			'pict' => $nama_file,
            'stock' => $request->stock,
            'category' => $request->category,
            'price' => $request->price,
            'color' => implode(",", $request->color),
            'description' => $request->description,
            'weight' => $request->weight,
		]);
        
        return redirect('product')->with('status', 'Barang Berhasil Ditambahkan!');
//        dd($product);
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
        $product = Product::where('id',$id)->get();
        $productc = Product::where('id',$id)->first();
        $color = Str::of($productc->color)->explode(',');
        
        return view('admin.product.show',compact('product','color'));
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
        $product = Product::where('id',$id)->get();
        $category = Category::get();
        
        return view('admin.product.edit',compact('product','category'));
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
        //validasi
        $product = Product::where('id',$id)->first();
        
        if($request->name == $product->name) {
            $rule_name = 'required';
        } else {
            $rule_name = 'required|unique:products';
        }
        
        $dataValid = $request->validate([
            'name' => $rule_name,
            'url' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'price' => 'required',
            'color' => 'required',
            'description' => 'required',
            'weight' => 'required',
        ],
        [
            'name.required' => 'Nama Barang harus di isi',
            'name.unique' => 'Nama Barang sudah ada',
            'url.required' => 'URL sudah digunakan',
            'stock.required' => 'Stok Barang harus di isi',
            'category.required' => 'Kategori Barang harus di isi',
            'price.required' => 'Harga Barang harus di isi',
            'color.required' => 'Warna Barang harus di isi',
            'description.required' => 'Jenis Barang harus di isi',
            'weight.required' => 'Berat Barang harus di isi',
        ]);
        
        $product->name = $request->name;
        $product->url = Str::slug($request->name);
        $product->stock = $request->stock;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->color = $request->color;
        $product->description = $request->description;
        $product->weight = $request->weight;
        $product->save();
        
        return redirect('product')->with('status', 'Barang Berhasil Diperbarui!');
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
        $produk = Product::where('id',$id)->first();
        File::delete('produk/'.$produk->pict);
    	$produk_del = Product::where('id',$id);
    	$produk_del->delete();
        
        return redirect()->back()->with('status', 'Barang Berhasil Dihapus!');
    }
}
