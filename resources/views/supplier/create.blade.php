@extends('layout.sbadmin')
@section('content')
<div class="container-fluid">
    <form class="mt-4" action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="fullname">Nama Supplier</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="fullname" name="fullname">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="username">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="username" name="username">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="password">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="password_confirmation">Confirm Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">

                <button type="submit" class="btn btn-warning">Create</button>
            </div>
        </div>
    </form>
</div>
@endsection
