<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('admin-permission');
        $products = Product::all();
        return view('admin.daftarobat', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('admin-permission');
        $suppliers = User::where('roles_id',2)->get();
        $categories = Category::all();
        return view('admin.tambahobat',compact('suppliers','categories'));
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
        $this->authorize('admin-permission');
        $product = new Product;
        $product->nama = $request->nama;
        $product->form = $request->form;
        $product->restriction_formula = $request->restriction_formula;
        $product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;
        $image = $request->file('image');
        $imgFolder = "obat";
        $imgFile = time()."_".$image->getClientOriginalName();
        $image->move($imgFolder,$imgFile);
        $product->image = $imgFile;
        $product->suppliers_id = $request->suppliers_id;
        $product->categories_id = $request->categories_id;
        $product->save();
        return redirect()->route('adminproduct.index')->with('status', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        $this->authorize('admin-permission');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $this->authorize('admin-permission');
        $product = Product::find($id);
        $suppliers = User::where('roles_id',2)->get();
        $categories = Category::all();
        return view('admin.editobat',compact('suppliers','categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->authorize('admin-permission');
        $product = Product::find($id);
        $product->nama = $request->nama;
        $product->form = $request->form;
        $product->restriction_formula = $request->restriction_formula;
        $product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;
        $product->suppliers_id = $request->suppliers_id;
        $product->categories_id = $request->categories_id;
        $product->save();
        return redirect()->route('adminproduct.edit', $product->id)->with('status', 'Produk berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->authorize('admin-permission');
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('adminproduct.index')->with('status', 'Obat berhasil dihapus');
    }
}
