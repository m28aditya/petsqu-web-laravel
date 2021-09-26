@extends('layouts.admin.main')

@section('content')
<div class="container-fluid mb-3">
  <div class="card shadow">
    <div class="card-body">
      @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <form action="/admin/product/create" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="kd_product">Kode Produk</label> <br>
          <input type="text" name="kd_product" id="kd_product"
            class="form-control @error('kd_product') is-invalid @enderror" placeholder="Kode Produk"
            value="{{old('kd_product')}}">
          @error('kd_product')
          <div class="text-left invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="nm_product">Nama Produk</label>
          <input type="text" name="nm_product" id="nm_product"
            class="form-control @error('nm_product') is-invalid @enderror" placeholder="Nama Produk"
            value="{{old('nm_product')}}">
          @error('nm_product')
          <div class="text-left invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="image">Upload Gambar</label>
          <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
          @error('image')
          <div class="text-left invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="stock">Stock</label>
          <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror"
            placeholder="Stock" value="{{old('stock')}}">
          @error('stock')
          <div class="text-left invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="price">Harga</label>
          <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
            placeholder="Harga" value="{{old('price')}}">
          @error('price')
          <div class="text-left invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="weight">Weight</label>
          <input type="number" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror"
            placeholder="Weight (gr)" value="{{old('weight')}}">
          @error('weight')
          <div class="text-left invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="category">Kategori</label>
          <select name="categories" id="categories" class="form-control">
            <option value="">Categories</option>
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
          </select>
          @error('categories')
          <div class="text-left invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="info">Info</label>
          <input id="info" type="hidden" name="info">
          <trix-editor input="info"></trix-editor>
        </div>
        @error('info')
        <div class="text-left invalid-feedback">
          {{ $message }}
        </div>
        @enderror
        <button type="submit" class="btn btn-primary btn-block mt-2">Simpan</button>
      </form>

    </div>
  </div>
</div>
@endsection