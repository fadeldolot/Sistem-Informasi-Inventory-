@extends('dashboard.master')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Table Data Distributor</h1>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>   
        @endif


        <div class="card mb-4">
            <div class="card-header">
                <svg class="svg-inline--fa fa-table fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM224 416H64v-96h160v96zm0-160H64v-96h160v96zm224 160H288v-96h160v96zm0-160H288v-96h160v96z"></path></svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
                 Table Data Distributor
            </div>
            <div class="card-body">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                    <div class="dataTable-top">
                        <div class="dataTable-dropdown">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah Data
                            </button>
                        </div>
                        <div class="dataTable-search">
                            <form action="/distributor" method="get">
                                 <input type="search"  class="form-control" name="search" placeholder="Search..." value="{{ $request->search }}">
                            </form>
                        </div>
                        </div>
                        <div class="dataTable-container">

                            <table id="datatablesSimple" class="dataTable-table">
                                <tr>
                                    <th>No</th>
                                    <th>ID Distributor</th>
                                    <th>Nama Distributor</th>
                                    <th>Nomor Hp</th>
                                    <th>Option</th>
                                </tr>
                                @foreach ($data_distributor as $index => $distributor)
                                <tr>
                                    <td>{{ $index + $data_distributor->firstItem() }}</td>
                                   <td>{{ $distributor->id }}</td>
                                   <td>{{ $distributor->nama_distributor }}</td>
                                   <td>{{ $distributor->no_hp }}</td>
                                    <td>
                                        <a href="/distributor/{{ $distributor->id }}/edit" class="btn btn-warning">Edit</a>
                                        <a href="/distributor/{{ $distributor->id }}/delete" class="btn btn-danger">Delete</a>
                                       
                                    </td>
                                </tr>
                                    
                                @endforeach
                            </table>
                            {{ $data_distributor->links() }}
                        </div>
            </div>
        </div>
    </div>
</main>


<!-- Form Modal -->
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
                  <input type="text" name="nama_distributor" class="form-control @error('nama_distributor') is-invalid @enderror" id="nama_distributor" placeholder="Masukan Nama Distributor"  required value="{{ old('nama_distributor') }}">
                    
                    @error('nama_distributor')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="mb-3">
                  <label for="no_hp" class="form-label">Nomor Hp</label>
                  <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Masukan Nomor Hp" required value="{{ old('no_hp') }}">
                
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

@endsection