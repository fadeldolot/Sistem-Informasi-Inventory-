@extends('dashboard.master')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Table Data Penjualan Produk</h1>

            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <div class="card mb-4">
                <div class="card-header">
                    <svg class="svg-inline--fa fa-table fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM224 416H64v-96h160v96zm0-160H64v-96h160v96zm224 160H288v-96h160v96zm0-160H288v-96h160v96z">
                        </path>
                    </svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
                    Data Penjualan Produk
                </div>
                <div class="card-body">
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                        <div class="dataTable-top">
                            <div class="dataTable-dropdown">
                                <!-- Button trigger modal -->
                                <a href="/data_penjualan/create" class="btn btn-outline-success btn-sm"> Tambah Data</a>
                            </div>
                            {{-- <div class="dataTable-search">
                                <form action="/data_penjualan" method="get">
                                    <input type="search" class="form-control" name="search" placeholder="Search..."
                                        value="{{ $request->search }}">
                                </form>
                            </div> --}}
                        </div>
                        <div class="dataTable-container">

                            <table id="datatablesSimple" class="dataTable-table">
                                <tr>
                                    <th>No</th>
                                    <th>ID Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th>Tanggal</th>
                                </tr>
                                @foreach ($penjualan as $index => $pnjl)
                                    <tr>
                                        <td>{{ $index + $penjualan->firstItem() }}</td>
                                        <td>{{ $pnjl->produk->id_produk }}</td>
                                        <td>{{ $pnjl->produk->nama_produk }}</td>
                                        <td>{{ $pnjl->jumlah }}</td>
                                        <td>{{ $pnjl->produk->satuan }}</td>
                                        <td>Rp. {{ $pnjl->harga }}</td>
                                        <td>Rp. {{ $pnjl->total_harga }}</td>
                                        <td>{{ $pnjl->created_at }}</td>
                                    </tr>
                                @endforeach
                            </table>
                            {{ $penjualan->links() }}
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
