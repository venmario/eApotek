@extends('layout.sbadmin')
@section('content')

<div class="container-fluid mt-4">
    <h1>Rekap Pembelian
        {{ Request::get('bulan') == null && Request::get('tahun') == null ? date('M')." ".date("Y") : DateTime::createFromFormat('!m', Request::get('bulan'))->format('F')." ".Request::get('tahun') }}
    </h1>
    <form action="" method="get">
        <div class="form-group row">
            <label class="col-sm-2">Bulan</label>
            <div class="col-sm-2">
                <select class="form-control" name="bulan" id="">
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <label class="col-sm-2">Tahun</label>
            <div class="col-sm-2">
                <select class="form-control" name="tahun" id="">
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                </select>
            </div>
            <div class="col-sm2">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>
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
