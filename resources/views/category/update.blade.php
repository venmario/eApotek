@extends('layout.sbadmin')
@section('content')
<div class="container-fluid">
    <form class="mt-4" action="{{ route('category.update',$category->id) }}" method="POST"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">Nama Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="nama" value="{{ $category->nama }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">Deskripsi</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi">{{ $category->deskripsi }}
                </textarea>
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
