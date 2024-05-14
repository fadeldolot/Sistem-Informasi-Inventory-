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
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $produk->id }}">
                                    Edit
                                </button>
                                <a href="/produk/{{ $produk->id }}/delete" class="btn btn-danger delete">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </main>

    <!-- Modal Edit -->
    @foreach ($data_produk as $index => $produk)
        <tr>
            ...
            <td>
                <div class="modal fade" id="editModal{{ $produk->id }}" tabindex="-1"
                    aria-labelledby="editModalLabel{{ $produk->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $produk->id }}">Edit Data Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/produk/{{ $produk->id }}/update" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="id_produk" class="form-label">ID Produk</label>
                                        <input type="text" name="id_produk" class="form-control" id="id_produk"
                                            aria-describedby="emailHelp" readonly value="{{ $produk->id_produk }}"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_produk" class="form-label">Nama Produk</label>
                                        <input type="text" name="nama_produk" class="form-control" id="nama_produk"
                                            value="{{ $produk->nama_produk }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="satuan" class="form-label">Satuan</label>
                                        <input type="text" name="satuan" class="form-control" id="satuan"
                                            value="{{ $produk->satuan }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="text" name="harga" class="form-control" id="harga"
                                            value="{{ $produk->harga }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stok" class="form-label">Stok</label>
                                        <input type="text" name="stok" class="form-control" id="stok"
                                            value="{{ $produk->stok }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="distributor" class="form-label">Distributor</label>
                                        <select name="distributor" class="form-select" id="distributor" required>
                                            <option value="" selected disabled>Pilih Distributor</option>
                                            @foreach ($distributors as $distributor)
                                                <option value="{{ $distributor->nama_distributor }}"
                                                    {{ $produk->distributor == $distributor->nama_distributor ? 'selected' : '' }}>
                                                    {{ $distributor->nama_distributor }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="brand" class="form-label">Brand</label>
                                        <input type="text" name="brand" class="form-control" id="brand"
                                            value="{{ $produk->brand }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-warning mb-4">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach


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
                            <input type="text" name="satuan"
                                class="form-control @error('satuan') is-invalid @enderror" id="satuan"
                                placeholder="Satuan" required value="{{ old('satuan') }}">

                            @error('satuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Barang</label>
                            <input type="text" name="harga"
                                class="form-control @error('harga') is-invalid @enderror" id="harga"
                                placeholder="Harga Barang" required value="{{ old('harga') }}">

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
                            <select name="distributor" class="form-select @error('distributor') is-invalid @enderror"
                                id="distributor" required>
                                <option value="" selected disabled>Pilih Distributor</option>
                                @foreach ($distributors as $distributor)
                                    <option value="{{ $distributor->nama_distributor }}">
                                        {{ old('distributor') == $distributor->nama_distributor ? 'selected' : '' }}
                                        {{ $distributor->nama_distributor }}
                                    </option>
                                @endforeach
                            </select>
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteButtons = document.querySelectorAll('.delete');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    var url = e.target.getAttribute('href');

                    Swal.fire({
                        title: 'Apakah Anda Yakin Ingin Menghapus Data Ini?',
                        text: 'Data Tersebut Akan Hilang Secara Permanen!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Lakukan permintaan HTTP untuk menghapus file dengan URL yang diberikan
                            fetch(url, {
                                    method: 'GET'
                                })
                                .then(data => {
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: 'Your file has been deleted.',
                                        icon: 'success'
                                    }).then(() => {
                                        location.reload();
                                    });
                                })
                                .catch(error => {
                                    console.error('Error deleting file:', error);
                                    Swal.fire({
                                        title: 'Error',
                                        text: 'Failed to delete file.',
                                        icon: 'error'
                                    });
                                });
                        }
                    });
                });
            });
        });
    </script>
@endsection
<
