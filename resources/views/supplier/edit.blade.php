@extends('layouts.app')
@section('title', 'Edit Supplier')
@section('heading', 'Edit Supplier')
@section('body')
  <form action="{{ route('supplier.update', ['supplier' => $supplier]) }}" method="post">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-12 col-lg-4 mb-2">
        <label for="Nama">Nama</label>
        <input type="text" class="form-control" name="nama_supplier" id="Nama" value="{{ $supplier->nama_supplier }}">
        @error('nama_supplier')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-lg-4 mb-2">
        <label for="jenis">Jenis</label>
        <select class="form-control" name="jenis_supplier" id="jenis">
          <option value="abu batu" {{ $supplier->jenis_supplier !== 'abu batu' ?: 'selected' }}>Abu batu</option>
          <option value="semen" {{ $supplier->jenis_supplier !== 'semen' ?: 'selected' }}>Semen</option>
        </select>
        @error('jenis_supplier')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-lg-4 mb-2">
        <label for="NoTelp">No Telp</label>
        <input type="tel" class="form-control" name="no_telp" id="NoTelp" value="{{ $supplier->no_telp }}">
        @error('no_telp')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 mb-2">
        <label for="Alamat">Alamat</label>
        <input type="text" class="form-control" name="alamat_supplier" id="Alamat"
          value="{{ $supplier->alamat_supplier }}">
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
