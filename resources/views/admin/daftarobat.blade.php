@extends('layout.sbadmin')
@section('content')
<div class="container-fluid mt-4">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <a href="{{ route('adminproduct.create') }}" class="btn btn-primary btn-lg">Tambah Obat</a>
    <br><br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Deskripsi</th>
                <th>Supplier</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($products as $d)
            <tr>
                <td>{{$i}}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->deskripsi}}</td>
                <td>{{$d->supplier->fullname}}</td>
                <td>{{$d->category->nama}}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('adminproduct.edit',$d->id) }}" class="btn btn-warning">Edit</a>&nbsp&nbsp
                    <form method="post" action="{{route('adminproduct.destroy', $d->id)}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg"
                            onclick="if(!confirm('Are you sure you want to delete this obat?')){return false;}">Delete</button>
                    </form>
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
