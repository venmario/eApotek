@extends('layout.sbadmin')
@section('content')



<div class="container-fluid mt-4">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <a href="{{ route('category.create') }}" class="btn btn-primary btn-lg">Tambah Kategori</a>
    <br><br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($category as $d)
            <tr>
                <td>{{$i}}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->deskripsi}}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('category.edit',$d->id) }}" class="btn btn-warning">Edit</a>&nbsp&nbsp
                    <form method="post" action="{{route('category.destroy', $d->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-lg"
                            onclick="if(!confirm('Are you sure you want to delete this category?')){return false;}">Delete</button>
                    </form>
                    @can('crud-permission', $d)
                    @endcan
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('modal')
<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add New category</h4>
            </div>
            <form method="post" action="{{route('category.store')}}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="" name="name">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type">
                            <option value="">Pilih tipe</option>
                            <option value="sparepart">Sparepart</option>
                            <option value="accessories">Accessories</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="text" class="form-control" id="unit" aria-describedby="emailHelp" placeholder=""
                            name="unit" id="unit">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEdit">Edit category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" id="modalContent">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
