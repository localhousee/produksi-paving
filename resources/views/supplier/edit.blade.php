@extends('layouts.app')
@section('title', 'Edit Supplier')
@section('heading', 'Edit Supplier')
@section('body')
  <form action="{{ route('supplier.update', ['supplier' => $supplier]) }}" method="post">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-12">
        <input type="text" class="form-control" name="nama_supplier" placeholder="Nama" value="{{ $supplier->nama_supplier }}">
        @error('nama_supplier') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="text" class="form-control" name="jenis_supplier" placeholder="Alamat" value="{{ $supplier->jenis_supplier }}">
        @error('jenis_supplier') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="text" class="form-control" name="alamat_supplier" placeholder="Alamat" value="{{ $supplier->alamat_supplier }}">
        @error('alamat_supplier') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="tel" class="form-control" name="no_telp" placeholder="No Telp" value="{{ $supplier->no_telp }}">
        @error('no_telp') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection