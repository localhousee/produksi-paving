@extends('layouts.app')
@section('title', 'Tambah Paving')
@section('heading', 'Tambah Paving')
@section('body')
  <form action="{{ route('paving.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-12">
        <input type="text" class="form-control" name="jenis" placeholder="Jenis">
        @error('jenis') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="tel" class="form-control" name="stok" placeholder="Stok">
        @error('stok') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="text" class="form-control" name="ukuran" placeholder="Ukuran">
        @error('ukuran') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="tel" class="form-control" name="harga" placeholder="Harga">
        @error('harga') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">
        @error('deskripsi') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="text" class="form-control" name="satuan" placeholder="Satuan">
        @error('satuan') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="file" class="form-control" name="gambar">
        @error('gambar') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="tel" class="form-control" name="semen" placeholder="Banyak Semen yang Dibutuhkan (sak)">
        @error('semen') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="tel" class="form-control" name="abu_batu" placeholder="Banyak Abu batu yang Dibutuhkan (m2)">
        @error('abu_batu') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection