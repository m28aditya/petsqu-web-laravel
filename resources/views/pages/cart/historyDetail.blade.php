@extends('layouts.main')
@section('content')
<section class="wrapper-cart">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pl-lg-0">
                <a href="/user/history" class="btn btn-my btn-sm mb-2"><i class="fa fa-arrow-left mr-2"></i>Kembali</a>
                <div class="card">
                    <div class="product-list">
                        <table class="table table-responsive-sm text-center mb-0">
                            <thead class="bg-danger text-white mx-0">
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
                                    <td class="align-middle text-left">{{ $item->product->nm_product }}</td>
                                    <td class="align-middle">Rp.{{ number_format($item->product->price) }}</td>
                                    <td class="align-middle">{{ $item->sum_product }}</td>
                                    <td class="align-middle">Rp.{{ number_format($item->sum_price) }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card px-3 py-3 mb-3 checkout-information">
                    <h2>Checkout Information</h2>
                    <table>
                        <tr>
                            <th width="50%" class="text-dark">Biaya Ongkir</th>
                            <td width="50%" class="text-right">
                                Rp.{{ number_format($ongkir) }}
                            </td>
                        </tr>
                        <tr>
                            <th width="50%" class="text-dark">Total Harga</th>
                            <td width="50%" class="text-right">
                                Rp.{{ number_format($order->total_price) }}
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <h2>Alamat Pengiriman</h2>
                    <label for="alamat" class="text-dark">{{ $order->address }}</label>
                    <hr>
                    <h2>Payment Instructions</h2>
                    <p class="text-dark">Harap segera transfer sejumlah harga total</p>
                    <div class="bank">
                        <div class="bank-item">
                            <h5><i class="fa fa-credit-card mr-2"></i>PT. Petsqu ID</h5>
                            <p class="text-dark">0881 8829 8800</p>
                            <p class="text-dark">Bank Central Asia</p>
                        </div>
                        <div class="bank-item">
                            <h5><i class="fa fa-credit-card mr-2"></i>PT. Petsqu ID</h5>
                            <p class="text-dark">0881 8829 8800</p>
                            <p class="text-dark">Bank Central Asia</p>
                        </div>
                    </div>

                    @if ($order->status == 'PROCESS')
                    <div>
                        <p href="user-history.html" class="btn btn-block btn-success mt-3 py-2"><i
                                class="fa fa-check-circle mr-1"></i> Pembayaran
                            Berhasil</p>
                    </div>
                    @else
                    <div>
                        <a href="https://wa.me/6282299157077?text=Tes Aja" class="btn btn-block btn-success mt-3 py-2"
                            target="_blank"><i class="fa fa-whatsapp mr-1"></i> Upload Bukti Pembayaran</a>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    </div>
    </div>
</section>
@endsection