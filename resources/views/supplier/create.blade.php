@extends('layouts.app')
@section('title', 'Tambah Supplier')
@section('heading', 'Tambah Supplier')
@section('body')
  <form action="{{ route('supplier.store') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12 col-lg-4 mb-2">
        <label for="Nama">Nama</label>
        <input type="text" class="form-control" name="nama_supplier" id="Nama">
        @error('nama_supplier')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-lg-4 mb-2">
        <label for="Jenis">Jenis</label>
        <select class="form-control" name="jenis_supplier" id="jenis">
          <option value="abu batu">Abu batu</option>
          <option value="semen">Semen</option>
        </select>
        @error('jenis_supplier')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-lg-4 mb-2">
        <label for="No">No Telp</label>
        <input type="tel" class="form-control" name="no_telp" id="No Telp">
        @error('no_telp')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 mb-2">
        <label for="Alamat">Alamat</label>
        <input type="text" class="form-control" name="alamat_supplier" id="Alamat">
        @error('alamat_supplier')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection
