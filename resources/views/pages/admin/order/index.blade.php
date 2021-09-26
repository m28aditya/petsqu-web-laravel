@extends('layouts.admin.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h4 class="mt-4">Products</h4>
        <hr>
        <table class="table table-responsive">
            <thead>
                <tr class="text-center bg-danger text-white">
                    <td>No</td>
                    <td>Alamat</td>
                    <td>Nama Pembeli</td>
                    <td>Total Harga</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                <tr class="text-center">
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle text-left" width="50%">{{ $item->address }}</td>
                    <td class="align-middle">{{ $item->user->name }}</td>
                    <td class="align-middle">Rp.{{ number_format($item->total_price) }}</td>
                    <td class="align-middle">
                        <a href="/admin/order/{{ $item->id }}/detail" class="btn btn-primary btn-sm"><i
                                class="fa fa-info me-2"></i> Detail</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</main>
@endsection