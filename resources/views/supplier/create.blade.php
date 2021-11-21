@extends('layouts.app')
@section('title', 'Tambah Supplier')
@section('heading', 'Tambah Supplier')
@section('body')
  <form action="{{ route('supplier.store') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <input type="text" class="form-control" name="nama_supplier" placeholder="Nama">
        @error('nama_supplier') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="text" class="form-control" name="jenis_supplier" placeholder="Jenis">
        @error('jenis_supplier') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="text" class="form-control" name="alamat_supplier" placeholder="Alamat">
        @error('alamat_supplier') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="tel" class="form-control" name="no_telp" placeholder="No Telp">
        @error('no_telp') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection