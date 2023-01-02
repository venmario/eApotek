@extends('layout.sbadmin')
@section('content')
<div class="container-fluid">
    <form class="mt-4" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">Nama Obat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="nama">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="form">Form</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="form" name="form">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="restriction_formula">Restriction Formula</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="restriction_formula" name="restriction_formula">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="harga">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">Deskripsi</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
            </div>
        </div>
        <input type="hidden" id="suppliers_id" name="suppliers_id" value="{{ $supplier->id }}">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="category">Kategori</label>
            <div class="col-sm-10">
                <select class="form-control" id="categorySelect" name="categories_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Tambah Gambar</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
        </div>
        <div class="form-group row">
            <div class="col-sm-10">

                <button type="submit" class="btn btn-warning">Create</button>
            </div>
        </div>
    </form>
</div>
@endsection
