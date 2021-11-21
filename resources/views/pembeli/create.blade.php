@extends('layouts.app')
@section('title', 'Tambah Pembeli')
@section('heading', 'Tambah Pembeli')
@section('body')
  <form action="{{ route('pembeli.store') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
        @error('nama') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
        @error('alamat') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="tel" class="form-control" name="no_telp" placeholder="No Telp" required>
        @error('no_telp') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection