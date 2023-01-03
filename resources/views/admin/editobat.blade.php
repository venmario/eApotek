@extends('layout.sbadmin')
@section('content')
<div class="container-fluid mt-4">
    @if (session('status'))
    <div class="alert alert-success mb-4">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('adminproduct.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">Nama Obat</label>
            <div class="col-sm-10">
                <input value="{{ $product->nama }}" type="text" class="form-control" id="name" name="nama">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="form">Form</label>
            <div class="col-sm-10">
                <input value="{{ $product->form }}" type="text" class="form-control" id="form" name="form">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="restriction_formula">Restriction Formula</label>
            <div class="col-sm-10">
                <input value="{{ $product->restriction_formula }}" type="text" class="form-control"
                    id="restriction_formula" name="restriction_formula">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="harga">Harga</label>
            <div class="col-sm-10">
                <input value="{{ $product->harga }}" type="text" class="form-control" id="harga" name="harga">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">Deskripsi</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                    name="deskripsi">{{ $product->deskripsi }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="supplier">Supplier</label>
            <div class="col-sm-10">
                <select class="form-control" id="supplierSelect" name="suppliers_id">
                    @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $supplier->id == $product->supplier->id ? "selected" : "" }}>
                        {{ $supplier->fullname }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="category">Kategori</label>
            <div class="col-sm-10">
                <select class="form-control" id="categorySelect" name="categories_id">
                    @foreach ($categories as $category)
                    @if ($product->category->id == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->nama }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
