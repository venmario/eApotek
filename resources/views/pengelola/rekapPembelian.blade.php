@extends('layout.sbadmin')
@section('content')

<div class="container-fluid mt-4">
    <h1>Rekap Pembelian</h1>
    <br><br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Transaksi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($transactions as $t)
            <tr>
                <td>{{$i}}</td>
                <td>{{$t->user->fullname}}</td>
                <td>{{$t->created_at}}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('rekapPembelianDetail',$t->id) }}" class="btn btn-warning">Detail</a>&nbsp&nbsp
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
