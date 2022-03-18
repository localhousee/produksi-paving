@extends('layouts.app')
@section('title', 'Tambah Paving')
@section('heading', 'Tambah Paving')
@section('body')
  <form action="{{ route('paving.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mb-2">
        <label for="jenis">Jenis</label>
        <input type="text" class="form-control" name="jenis" id="jenis">
        @error('jenis')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-3 mb-2">
        <label for="stok">Stok</label>
        <input type="tel" class="form-control" name="stok" id="stok">
        @error('stok')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-3 mb-2">
        <label for="ukuran">Ukuran</label>
        <input type="text" class="form-control" name="ukuran" id="ukuran">
        @error('ukuran')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-3 mb-2">
        <label for="harga">Harga</label>
        <input type="tel" class="form-control" name="harga" id="harga">
        @error('harga')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-lg-9 mb-2">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" id="deskripsi">
        @error('deskripsi')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-3 mb-2">
        <label for="satuan">Satuan</label>
        <input type="text" class="form-control" name="satuan" id="satuan">
        @error('satuan')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      {{-- <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="gambar">Gambar</label>
        <input type="file" class="form-control" name="gambar" nameidgambar">
        @error('gambar')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div> --}}
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="semen">Banyak Semen yang Dibutuhkan (sak)</label>
        <input type="tel" class="form-control" name="semen" id="semen">
        @error('semen')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="abu_batu">Banyak Abu batu yang Dibutuhkan (m2)</label>
        <input type="tel" class="form-control" name="abu_batu" id="abu_batu">
        @error('abu_batu')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 mb-2">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection
