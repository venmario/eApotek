@extends('layout.sbadmin')

@section('content')

<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaction_details as $details)
        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{$details->product->nama}}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">Rp. {{$details->product->price}}</td>
            <td data-th="Quantity">{{$details->quantity}}</td>
            <td data-th="Subtotal" class="text-center">Rp. {{$details->subtotal}}</td>
            <td class="actions" data-th=""></td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{$details->transaction->total_harga}}</strong></td>
        </tr>
        <tr>
            <td>
            </td>
            <td class="hidden-xs"></td>
            <td class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total Rp. {{$details->transaction->total_harga}}</strong></td>
        </tr>
    </tfoot>
</table>

@endsection
