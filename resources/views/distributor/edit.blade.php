@extends('dashboard.master')
@section('content')
<h1 class="text-center mt-4">Edit Data Distributor</h1>

<div class="row justify-content-center">
    <div class="col-md-4">
        <form  action="/distributor/{{ $distributor->id }}/update" method="post" >
          @csrf
            <div class="mb-3">
              <label for="nama_distributor" class="form-label">Nama Distributor</label>
              <input type="text" name="nama_distributor" class="form-control" id="nama_distributor" aria-describedby="emailHelp" value="{{ $distributor->nama_distributor }}" required>
            </div>

            <div class="mb-3">
              <label for="no_hp" class="form-label">Nomor Hp</label>
              <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{ $distributor->no_hp }}" required>
            </div>

            <button type="submit" class="btn btn-warning mb-4">Simpan</button>
        </form>
    </div>
</div>
@endsection



