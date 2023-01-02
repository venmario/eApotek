@extends('layout.sbadmin')
@section('content')
<div class="container-fluid mt-4">
    @if (session('status'))
    <div class="alert alert-success mb-3">
        {{ session('status') }}
    </div>
    @endif
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="name">Nama Obat</label>
        <div class="col-sm-10">
            <input value="{{ $product->nama }}" type="text" class="form-control" disabled id="name" name="nama">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="form">Form</label>
        <div class="col-sm-10">
            <input value="{{ $product->form }}" type="text" class="form-control" disabled id="form" name="form">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="restriction_formula">Restriction Formula</label>
        <div class="col-sm-10">
            <input value="{{ $product->restriction_formula }}" type="text" class="form-control" disabled
                id="restriction_formula" name="restriction_formula">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="harga">Harga</label>
        <div class="col-sm-10">
            <input value="{{ $product->harga }}" type="text" class="form-control" disabled id="harga" name="harga">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="name">Deskripsi</label>
        <div class="col-sm-10">
            <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3"
                name="deskripsi">{{ $product->deskripsi }}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="supplier">Supplier</label>
        <div class="col-sm-10">
            <input value="{{ $product->supplier->fullname }}" type="text" class="form-control" disabled
                id="suppliers_id" name="suppliers_id">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="category">Kategori</label>
        <div class="col-sm-10">
            <input value="{{ $product->category->nama }}" type="text" class="form-control" disabled id="categories_id"
                name="categories_id">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="category">Kategori</label>
        <div class="col-sm-10">
            <input value="{{ $product->category->nama }}" type="text" class="form-control" disabled id="categories_id"
                name="categories_id">
        </div>
    </div>

    <form action="{{ route('addToCart') }}" method="POSt">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="quantity">Jumlah</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-warning">Masukkan ke keranjang</button>
            </div>
        </div>
    </form>
</div>
@endsection
