@extends('layouts.app')
@section('title', 'Tambah Bahan Baku')
@section('heading', 'Tambah Bahan Baku')
@section('body')
  <form action="{{ route('bahan-baku.store') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <select name="jenis" class="form-control">
          <option value="abu batu">Abu batu</option>
          <option value="semen">Semen</option>
        </select>
        @error('jenis') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="text" class="form-control" name="merk" placeholder="Merk">
        @error('merk') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="text" class="form-control" name="harga_satuan" placeholder="Harga satuan">
        @error('harga_satuan') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="tel" class="form-control" name="stok" placeholder="Stok">
        @error('stok') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <select name="satuan" class="form-control">
          <option value="m3">m3</option>
          <option value="sak">Sak</option>
        </select>
        @error('satuan') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection