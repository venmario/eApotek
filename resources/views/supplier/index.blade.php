@extends('layout.sbadmin')
@section('content')



<div class="container-fluid mt-4">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-lg">Tambah Supplier</a>
    <br><br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($suppliers as $d)
            <tr>
                <td>{{$i}}</td>
                <td>{{$d->fullname}}</td>
                <td>{{$d->alamat}}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('supplier.edit',$d->id) }}" class="btn btn-warning">Edit</a>&nbsp&nbsp
                    <form method="post" action="{{route('supplier.destroy', $d->id)}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg"
                            onclick="if(!confirm('Are you sure you want to delete this supplier?')){return false;}">Delete</button>
                    </form>
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
