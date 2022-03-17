@extends('dashboard.master')
@section('content')
<h1 class="text-center mt-4">Edit Data Barang</h1>

<div class="row justify-content-center">
    <div class="col-md-4">
        <form  action="/produk/{{ $produk->id }}/update" method="post" >
          @csrf
            <div class="mb-3">
              <label for="id_produk" class="form-label">ID Produk</label>
              <input type="text" name="id_produk" class="form-control" id="id_produk" aria-describedby="emailHelp" value="{{ $produk->id_produk }}" required>
              
            </div>

            <div class="mb-3">
              <label for="nama_produk" class="form-label">Nama Produk</label>
              <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="{{ $produk->nama_produk }}" required>
            </div>

            <div class="mb-3">
              <label for="satuan" class="form-label">Satuan</label>
              <input type="text" name="satuan" class="form-control" id="satuan" value="{{ $produk->satuan }}" required>
            </div>

            <div class="mb-3">
              <label for="harga" class="form-label">Harga</label>
              <input type="text" name="harga" class="form-control" id="harga" value="{{ $produk->harga }}" required>
            </div>

            <div class="mb-3">
              <label for="stok" class="form-label">Stok</label>
              <input type="text" name="stok" class="form-control" id="stok" value="{{ $produk->stok }}" required>
            </div>

            <div class="mb-3">
              <label for="distributor" class="form-label">Distributor</label>
              <input type="text" name="distributor" class="form-control" id="distributor" value="{{ $produk->distributor }}" required>
            </div>

            <div class="mb-3">
              <label for="brand" class="form-label">Brand</label>
              <input type="text" name="brand" class="form-control" id="brand" value="{{ $produk->brand }}" required>
            </div>

            <button type="submit" class="btn btn-warning mb-4">Simpan</button>
        </form>
    </div>
</div>
@endsection



