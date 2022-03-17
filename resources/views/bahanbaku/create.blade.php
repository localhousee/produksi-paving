@extends('layouts.app')
@section('title', 'Tambah Bahan Baku')
@section('heading', 'Tambah Bahan Baku')
@section('body')
  <form action="{{ route('bahan-baku.store') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="jenis">Jenis</label>
        <select name="jenis" id="jenis" class="form-control">
          <option value="abu batu">Abu batu</option>
          <option value="semen">Semen</option>
        </select>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="merk">Merk</label>
        <input type="text" class="form-control" name="merk" id="merk">
        @error('merk')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="harga">Harga</label>
        <input type="text" class="form-control" name="harga" id="harga">
        @error('harga')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="stok">Stok</label>
        <input type="tel" class="form-control" name="stok" id="stok">
        @error('stok')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="satuan">Satuan</label>
        <select name="satuan" id="satuan" class="form-control">
          <option value="m3">m3</option>
          <option value="sak">Sak</option>
        </select>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection
