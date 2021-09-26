@extends('layouts.admin.main')
@section('content')
<div class="container-fluid">
    <a href="/admin/product/" class="btn btn-primary my-3">Kembali</a>
    <div class="card shadow">
        <div class="card-body">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <table class="table table-bordered table-responsive-sm">
                <tr>
                    <th>Nama Pembeli</th>
                    <td>{{ $order->user->name }}</td>
                </tr>
                <tr>
                    <th>Alamat Pengiriman</th>
                    <td>{{ $order->address }}</td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>Rp.{{ number_format($order->total_price) }}</td>
                </tr>

                <form action="/admin/order/{{ $order->id }}/confirm" method="post">
                    @csrf
                    <tr>
                        <th>Status</th>
                        <td class="d-flex">
                            <select class="form-select me-3" name="status">
                                <option value="{{ $order->status }}">{{ $order->status }}</option>
                                <option value="PENDING">PENDING</option>
                                <option value="PROCESS">PROCESS</option>
                                <option value="SUCCESS">SUCCESS</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </td>
                    </tr>
                </form>

                <tr>
                    <th>
                        Detail
                    </th>
                    <td>
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <th>Nama Produk</th>
                                <th>Jumlah Produk</th>
                            </tr>
                            @foreach ($orderList as $item)
                            <tr class="text-center">
                                <td>{{ $item->product->nm_product }}</td>
                                <td>{{ $item->sum_product }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>

            </table>
        </div>
    </div>
</div>
@endsection