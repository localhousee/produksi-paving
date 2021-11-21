@extends('layouts.app')
@section('title', 'Edit Pembeli')
@section('heading', 'Edit Pembeli')
@section('body')
  <form action="{{ route('pembeli.update', ['pembeli' => $pembeli]) }}" method="post">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-12">
        <input required type="text" class="form-control" name="nama" placeholder="Nama" value="{{ $pembeli->nama }}">
        @error('nama') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input required type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{ $pembeli->alamat }}">
        @error('alamat') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input required type="tel" class="form-control" name="no_telp" placeholder="No Telp" value="{{ $pembeli->no_telp }}">
        @error('no_telp') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection