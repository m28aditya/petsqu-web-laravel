@extends('layouts.main')
@section('content')
<section class="wrapper-product_details">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="/product/category/{{ $data->categories }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $data->slug }}</li>
      </ol>
    </nav>
    <a href="/product/category/{{ $data->categories }}" class="btn btn-sm mb-1 btn-my"><i
        class="fa fa-arrow-left mr-1"></i>Kembali</a>
    @if (session()->has('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('failed') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="alert-danger"></div>
    <div class="card">
      <div class="row no-gutters">
        <div class="col">
          <img class="d-block mx-auto mt-5 align-middle img-fluid" style="width: 50%;"
            src="{{ asset('storage').'/'.$data->image }}" alt="">
        </div>
        <div class="col">
          <div class="card-body">
            <h2>{{ $data->nm_product }}</h2>
            <table class="table">
              <tr>
                <td><strong>Harga</strong></td>
                <td>:</td>
                <td>Rp.{{ number_format($data->price) }}</td>
              </tr>
              <tr>
                <td><strong>Stock</strong></td>
                <td>:</td>
                <td>{{ $data->stock }}</td>
              </tr>
              <tr>
                <td><strong>Berat</strong></td>
                <td>:</td>
                <td>{{ $data->weight }}<span>gr</span></td>
              </tr>
              <form action="/product/{{ $data->slug }}/add" method="POST">
                @csrf
                <tr>
                  <input type="hidden" value="{{ $data->weight }}">
                  <td><strong>Jumlah</strong></td>
                  <td>:</td>
                  <td>
                    <input type="number" name="sum_product" value="1">
                    <input type="hidden" name="sum_weight" value={{ $data->weight }}>
                  </td>
                </tr>
                <tr>
                  <td><strong>Info</strong></td>
                  <td></td>
                  <td colspan="3"><small>{!! $data->info !!}</small></td>
                </tr>
                @guest
                <tr>
                  <td>
                    <a href="/auth/sign-up" class="btn btn-info">
                      <i class="fa fa-shopping-cart mr-2"></i>Add to Cart
                    </a>
                  </td>
                </tr>
                @endguest
                @auth
                <tr>
                  <td>
                    <button type="submit" class="btn btn-info">
                      <i class="fa fa-shopping-cart mr-2"></i>Add to Cart
                    </button>
                  </td>
                </tr>
                @endauth
              </form>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection