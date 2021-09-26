@extends('layouts.main')
@section('content')
<section>
    <div class="wrapper-index">
        <div class="jumbotron text-center">
        </div>

        <!-- Content -->
        <div class="dog-food pb-5">
            <div class="container">
                <h1 class="text-center">Dog Foods</h1>
                <div class="row">

                    @foreach ($dataDog as $item)
                    <div class="col-md-3 col-sm-12 mt-4">
                        <div class="card" style="height: 70vh;">
                            <img src="{{ asset('storage').'/'.$item->image }}" class="py-2 img-fluid"
                                alt="Dog-Foods-Images">
                            <div class="card-body" style="height: 100vh;">
                                <h5 class=" card-title"><strong>{{ $item->nm_product }}</strong></h5>
                                <p card="card-text">Harga: Rp.{{ number_format($item->price) }}</p>
                                <p card="card-text">Stok: {{ $item->stock }}</p>
                                <p card="card-text">Berat: {{ $item->weight }}gr</p>
                                <a href="/product/{{ $item->slug }}/detail" class="btn btn-my">Beli</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endsection