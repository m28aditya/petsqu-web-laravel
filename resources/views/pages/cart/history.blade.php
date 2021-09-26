@extends('layouts.main')
@section('content')
<section class="wrapper-history">
    <div class="container">
        <div class="card mx-3">
            <table class="table table-responsive-sm mb-0 table-sm">
                <thead class="bg-danger text-white">
                    <tr class="text-center">
                        <td>No</td>
                        <td>Tanggal</td>
                        <td>Total Harga</td>
                        <td>Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderList as $item)
                    <tr class="text-center">
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $item->created_at->toDateString() }}</td>
                        <td class="align-middle">Rp.{{ number_format($item->total_price) }}</td>
                        <td class="align-middle">{{ $item->status }}</td>
                        <td class="align-middle">
                            <a href="/user/history/{{ $item->id }}/detail" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection