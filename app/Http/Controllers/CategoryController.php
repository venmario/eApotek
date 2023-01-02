<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::all();
        return view('category.index',compact('category'));
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
        return view('category.create');
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
        $category = new Category;
        $category->nama = $request->nama;
        $category->deskripsi = $request->deskripsi;
        $category->save();
        return redirect()->route('category.index')->with('status', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        $this->authorize('supplier-permission');
        return view('category.update',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $this->authorize('supplier-permission');
        $category->nama = $request->nama;
        $category->deskripsi = $request->deskripsi;
        $category->save();
        return redirect()->route('category.index')->with('status', 'Kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $this->authorize('supplier-permission');
        try {
            $category->delete();
            return redirect()->route('category.index')->with('status', 'Kategori berhasil dihapus');
        } catch (\PDOException $e) {
            $msg =  $this->handleAllRemoveChild($category);
            return redirect()->route('category.index')->with('error', $msg);
        }
    }
}
