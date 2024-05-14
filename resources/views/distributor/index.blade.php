@extends('dashboard.master')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex gap-3 justify-content-between">
                <h1 class="mt-4">Table Data Distributor</h1>
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
                        <th>Nama Distributor</th>
                        <th>No Hp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($distributors as $index => $distributor)
                        <tr>
                            <td>{{ $index + $distributors->firstItem() }}</td>
                            <td>{{ $distributor->nama_distributor }}</td>
                            <td>{{ $distributor->no_hp }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $distributor->id }}">
                                    Edit
                                </button>
                                <a href="/distributor/{{ $distributor->id }}/delete"
                                    class="btn btn-danger delete">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $distributors->links() }}
        </div>
    </main>

    {{-- Form Edit Modal --}}
    <!-- Modal Edit -->
    @foreach ($distributors as $index => $distributor)
        <tr>
            ...
            <td>
                <div class="modal fade" id="editModal{{ $distributor->id }}" tabindex="-1"
                    aria-labelledby="editModalLabel{{ $distributor->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $distributor->id }}">Edit Data Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/distributor/{{ $distributor->id }}/update" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama_distributor" class="form-label">Nama Distributor</label>
                                        <input type="text" name="nama_distributor" class="form-control"
                                            id="nama_distributor" aria-describedby="emailHelp"
                                            value="{{ $distributor->nama_distributor }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">Nomor Hp</label>
                                        <input type="text" name="no_hp" class="form-control" id="no_hp"
                                            value="{{ $distributor->no_hp }}" required>
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
    <!-- Form Entry Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Distributor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/distributor/create">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_distributor" class="form-label">Nama Distributor</label>
                            <input type="text" name="nama_distributor"
                                class="form-control @error('nama_distributor') is-invalid @enderror" id="nama_distributor"
                                placeholder="Masukan Nama Distributor" required value="{{ old('nama_distributor') }}">

                            @error('nama_distributor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Nomor Hp</label>
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                                id="no_hp" placeholder="Masukan Nomor Hp" required value="{{ old('no_hp') }}">

                            @error('no_hp')
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
