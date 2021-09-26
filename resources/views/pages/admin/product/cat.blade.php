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
                    <td>Nama Produk</td>
                    <td>Stock</td>
                    <td>Harga</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr class="text-center">
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle text-left" width="50%">{{ $item->nm_product }}</td>
                    <td class="align-middle">{{ $item->stock }}</td>
                    <td class="align-middle">Rp.{{ number_format($item->price) }}</td>
                    <td class="align-middle">
                        <a href="/admin/product/{{ $item->slug }}/detail" class="btn btn-primary btn-sm"><i
                                class="fa fa-info me-2"></i> Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection