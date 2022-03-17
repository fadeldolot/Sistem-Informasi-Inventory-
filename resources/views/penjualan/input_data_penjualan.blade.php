<!doctype html>
@extends('dashboard.master')
@section('content')
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Input Data Penjualan</title>
    @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>   
        @endif
  </head>
  <body>
    <h1 class="text-center mt-4">Form Input Data penjualan</h1>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <form  action="/data_penjualan/store" method="post" >
                @csrf
                  <div class="mb-3">

                    <label for="produk_id" class="form-label">ID Produk</label>
                    <select name="produk_id"  class="form-select @error('produk_id') is-invalid @enderror" id="produk_id">
                        <option value="">-Pilih-</option>
                        @foreach ($produks as $item)
                         <option value="{{ $item->id }}" {{ old('produk_id') == $item->id ? 'selected' :null }}>{{ $item->id_produk }}</option>
                        @endforeach
                    </select>
                    @error('produk_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                      
                  </div>
      
                  <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <select name="nama_produk" class="form-select @error('nama_produk') is-invalid @enderror" id="nama_produk">
                        <option value="">-Pilih-</option>
                        @foreach ($produks as $item)
                         <option value="{{ $item->id }}" {{ old('nama_produk') == $item->id ? 'selected' :null }}>{{ $item->nama_produk }}</option>
                        @endforeach
                      </select>
                      @error('nama_produk')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label  class="form-label">Jumlah</label>
                    <input type="text"   name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jml" onkeyup="perkalian()"  value="{{ old('jumlah') }}">
                    
                    @error('jumlah')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                </div>

                  <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <select name="satuan" class="form-select @error('satuan') is-invalid @enderror" id="satuan">
                        <option value="">-Pilih-</option>
                        @foreach ($produks as $item)
                         <option value="{{ $item->id }}" {{ old('satuan') == $item->id ? 'selected' :null }}>{{ $item->satuan }}</option>
                        @endforeach
                      </select>

                      @error('satuan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="text"   name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" onkeyup="perkalian()"  value="{{ old('harga') }}">

                    @error('harga')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Total Harga</label>
                    <input type="text"   name="total_harga" class="form-control @error('total_harga') is-invalid @enderror" id="total_harga"   readonly>

                    @error('total_harga')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary mb-4">Simpan</button>
                  <a href="/data_penjualan" class="btn btn-warning mb-4">Back</a>
                </form>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    
 
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

   
    <script>
      function perkalian() {
        var nilai1 = $('input[name="jumlah"]').val();
        var nilai2 = $('input[name="harga"]').val();
        var hasil = parseFloat(nilai1) * parseFloat(nilai2);
        if (!isNaN(hasil)) {
          $('input[name="total_harga"]').val(hasil);
        }
      }
    </script>  


   
  </body>
</html>
@endsection