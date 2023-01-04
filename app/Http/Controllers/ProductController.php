<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user() && Auth::user()->roles_id == 1) {
            $resetpoin = new User();
            $resetpoin->resetPoin(Auth::user()->id);
        }

        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('supplier-permission');
        $supplier = Auth::user();
        $categories = Category::all();
        return view('product.create', compact('categories','supplier'));
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
        $this->authorize('supplier-permission');
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
        return redirect()->route('product.index')->with('status', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $this->authorize('supplier-permission');
        $supplier = Auth::user();
        $categories = Category::all();
        return view('product.update', compact('categories','supplier','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        //
        $this->authorize('supplier-permission');
        $product->nama = $request->nama;
        $product->form = $request->form;
        $product->restriction_formula = $request->restriction_formula;
        $product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;
        $product->suppliers_id = $request->suppliers_id;
        $product->categories_id = $request->categories_id;
        $product->save();
        return redirect()->route('product.edit', $product->id)->with('status', 'Produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $this->authorize('supplier-permission');
        try {
            $product->delete();
            return redirect()->route('index.suppliers')->with('status', 'Obat berhasil dihapus');
        } catch (\PDOException $e) {
            $msg =  $this->handleAllRemoveChild($product);
            return redirect()->route('index.suppliers')->with('error', $msg);
        }
    }

    public function supplierindex()
    {
        $this->authorize('supplier-permission');
        $products = Product::where('suppliers_id',Auth::user()->id)->get();
        return view('product.indexSupplier',compact('products'));
    }

    public function addToCart(Request $request)
    {
        $this->authorize('checkmember');
        $id = $request->product_id;
        $product = Product::find($id);
        $qty = $request->quantity;
        $cart = session()->get('cart');
        if (!isset($cart[$id])) {
            $cart[$id] = [
                'productId' => $product->id,
                'name' => $product->nama,
                'quantity' => $qty,
                'price' => $product->harga,
            ];
        } else {
            $cart[$id]['quantity'] += $qty;
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('status', 'Produk obat berhasil ditambahkan ke keranjang');
    }

    public function cart()
    {
        $this->authorize('checkmember');
        return view('transaction.cart');
    }
}
