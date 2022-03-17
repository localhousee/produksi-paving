@extends('layouts.app')
@section('title', 'Tambah Pembeli')
@section('heading', 'Tambah Pembeli')
@section('body')
  <form action="{{ route('pembeli.store') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12 col-md-6 mb-2">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" required>
        @error('nama')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 mb-2">
        <label for="no_telp">No telp</label>
        <input type="tel" class="form-control" name="no_telp" id="no_telp" required>
        @error('no_telp')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 mb-2">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="alamat" required>
        @error('alamat')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection
