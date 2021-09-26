@extends('layouts.main')
@section('content')
<section>
    <div class="wrapper-index">
        <div class="jumbotron text-center">
        </div>

        <!-- Content -->
        <div class="dog-food pb-5">
            <div class="container">
                <h1 class="text-left">"{{ $search }}"</h1>
                <div class="row">

                    @foreach ($products as $item)
                    <div class="col-md-3 col-sm-12 mt-4">
                        <div class="card" style="height: 70vh;">
                            <img src="{{ asset('storage').'/'.$item->image }}" class="py-2 img-fluid"
                                alt="Dog-Foods-Images">
                            <div class="card-body" style="height: 100vh;">
                                <h5 class="card-title">{{ $item->nm_product }}</h5>
                                <p card="card-text"><strong>Harga</strong>:
                                    Rp.{{ number_format($item->price) }}</p>
                                <p card="card-text"><strong>Stok</strong>:
                                    {{ $item->stock }}</p>
                                <p card="card-text"><strong>Berat</strong>: {{ $item->weight }}gr</p>
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