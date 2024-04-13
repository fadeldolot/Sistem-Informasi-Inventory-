@extends('dashboard.master')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex gap-3 justify-content-between">
                <h1 class="mt-4">Table Data Produk</h1>
                <div class="justify-content-center align-self-center">
                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Tambah Data
                    </button>
                </div>
            </div>

            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk ID</th>
                        <th>Nama</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Distributor</th>
                        <th>Brand</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_produk as $index => $produk)
                        <tr>
                            <td>{{ $index + $data_produk->firstItem() }}</td>
                            <td>{{ $produk->id_produk }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->satuan }}</td>
                            <td>{{ $produk->harga }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>{{ $produk->distributor }}</td>
                            <td>{{ $produk->brand }}</td>
                            <td>
                                <a href="/produk/{{ $produk->id }}/edit" class="btn btn-warning">Edit</a>
                                <a href="/produk/{{ $produk->id }}/delete" class="btn btn-danger" id="delete">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </main>

    <!-- Modal Edit -->


    <!-- Form Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/produk/create">
                        @csrf
                        <div class="mb-3">
                            <label for="id_produk" class="form-label">ID Produk</label>
                            <input type="text" name="id_produk"
                                class="form-control @error('id_produk') is-invalid @enderror" id="id_produk"
                                placeholder="Id Produk" required readonly value="{{ $data_produk }}">

                            @error('id_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk"
                                class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk"
                                placeholder="Nama Produk" required value="{{ old('nama_produk') }}">

                            @error('nama_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror"
                                id="satuan" placeholder="Satuan" required value="{{ old('satuan') }}">

                            @error('satuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Barang</label>
                            <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror"
                                id="harga" placeholder="Harga Barang" required value="{{ old('harga') }}">

                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="text" name="stok" class="form-control @error('stok') is-invalid @enderror"
                                id="stok" placeholder="Stok" required value="{{ old('stok') }}">

                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="distributor" class="form-label">Distributor</label>
                            <input type="text" name="distributor"
                                class="form-control @error('distributor') is-invalid @enderror" id="distributor"
                                placeholder="Distributor" required value="{{ old('distributor') }}">

                            @error('distributor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <input type="text" name="brand"
                                class="form-control @error('brand') is-invalid @enderror" id="brand"
                                placeholder="Brand" required value="{{ old('brand') }}">

                            @error('brand')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    @endsection
<script>
    new DataTable('#example');
</script>
