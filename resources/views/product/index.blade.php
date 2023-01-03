@extends('layout.sbadmin')
@section('content')
<div class="container-fluid mt-4">
    <div class="">
        @if (session('status'))
        <div class="alert alert-success mb-3">
            {{ session('status') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger mb-3">
            {{ session('error') }}
        </div>
        @endif
        <h1 class="h1 text-center my-2">Produk Obat</h1>
        <div class="row p-3 justify-content-around">
            @foreach ($products as $product)
            <div class="col-lg-3 mb-3">
                <div class="card h-100">
                    <img src="{{ asset('obat') }}/{{$product->image}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-text">{{ $product->nama }}</h4>
                        <p>Harga : {{ number_format($product->harga) }}</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-danger stretched-link" href="{{ route('product.show',$product->id) }}">View
                            Details</a>
                        <div class="small text-black">
                            <i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</div>
@endsection
