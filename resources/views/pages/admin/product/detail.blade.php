@extends('layouts.admin.main')

@section('content')
<div class="container-fluid">
  <div class="card shadow my-3">
    <a href="/admin/product/{{ $data->categories }}" class="btn btn-primary">Kembali</a>
    <div class="card-body">
      <table class="table table-bordered table-responsive-sm">
        <tr>
          <th>Nama Produk</th>
          <td>{{$data->nm_product}}</td>
        </tr>
        <tr>
          <th>Kode Produk</th>
          <td>{{$data->kd_product}}</td>
        </tr>
        <tr>
          <th>Stok</th>
          <td>{{$data->stock}}</td>
        </tr>
        <tr>
          <th>Harga</th>
          <td>Rp.{{number_format($data->price)}}</td>
        </tr>
        <tr>
          <th>Kategori</th>
          <td>{{$data->categories}}</td>
        </tr>
        <tr>
          <th>Info</th>
          <td>{!! $data->info !!}</td>
        </tr>
        <tr>
          <th class="align-middle">
            Aksi
          </th>
          <td class="d-flex">
            <a href="/admin/product/{{ $data->slug }}/edit" class="btn btn-primary">Ubah</a>
            <form action="/admin/{{ $data->id }}/delete" method="POST">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger mx-2"><i class="fa fa-trash me-2"></i>Hapus</button>
            </form>
          </td>
        </tr>
        <tr>
          <th>
            Gambar
          </th>
          <td>
            <div class="card">
              <img src="{{ asset('storage').'/'.$data->image}}" alt="Image" class="img-fluid" width="200">
            </div>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection