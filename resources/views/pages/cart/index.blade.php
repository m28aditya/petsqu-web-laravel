@extends('layouts.main')

@section('content')
<section class="wrapper-cart">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pl-lg-0">
                <a href="/product/" class="btn btn-my btn-sm mb-2"><i class="fa fa-arrow-left mr-2"></i>Kembali</a>
                <div class="card px-2">
                    <div class="product-list">
                        <table class="table table-responsive-sm text-center mb-0 pb-0">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Produk</td>
                                    <td>Harga</td>
                                    <td>Jumlah</td>
                                    <td>Total Harga</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orderList as $item)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $item->product->nm_product }}</td>
                                    <td class="align-middle">Rp.{{ number_format($item->product->price) }}</td>
                                    <td class="align-middle">{{ $item->sum_product }}</td>
                                    <td class="align-middle">Rp.{{ number_format($item->sum_price) }}</td>
                                    <form action="/user/cart/{{ $item->id }}/delete" method="post">
                                        @csrf
                                        <td class="align-middle">
                                            <button type="submit" class="btn btn-my btn-sm"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <form class="my-3" action="/user/cart/{{ $order->id }}/confirm" method="POST">
                    @csrf
                    <h4 class="font-weight-bold">Alamat Pengiriman</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address"
                            placeholder="Masukkan Alamat Legkap Nama Jalan - Provinsi Tujuan" autofocus>
                    </div>
            </div>
            <div class="col-lg-4">
                <div class="card px-3 py-2 checkout-information">
                    <h2>Checkout Information</h2>
                    <table class="trip-information">
                        <tr>
                            <th width="50%">Sub Total</th>
                            <td width="50%" class="text-right">
                                Rp.{{ number_format($order->total_price) }}
                            </td>
                        </tr>
                        <tr>
                            <th width="50%">Biaya Ongkir</th>
                            <td width="50%" class="text-right">
                                Rp.{{ number_format($ongkir) }}
                            </td>
                        </tr>
                        <tr>
                            <th width="50%"><small class="text-muted">*Ongkir Rp.5000/1kg</small></th>
                        </tr>
                        <tr>
                            <th width="50%">Total Harga</th>
                            <td width="50%" class="text-right text-total">
                                Rp.{{ number_format($totalHarga) }}
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" value="{{ $totalHarga }}" name="total_price">
                    <button type="submit" class="btn btn-block btn-danger text-white mt-3 py-2">Konfirmasi
                        Pesanan</button>
                    </form>

                    <hr>
                    <h2>Payment Instructions</h2>
                    <small class="text-muted">Silahkan transfer ke nomor rekening berikut
                    </small>
                    <div class="bank">
                        <div class="bank-item">
                            <h5><i class="fa fa-credit-card mr-2"></i>PT. Petsqu ID</h5>
                            <p>0881 8829 8800</p>
                            <p>Bank Central Asia</p>
                        </div>
                        <div class="bank-item">
                            <h5><i class="fa fa-credit-card mr-2"></i>PT. Petsqu ID</h5>
                            <p>0881 8829 8800</p>
                            <p>Bank Central Asia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection