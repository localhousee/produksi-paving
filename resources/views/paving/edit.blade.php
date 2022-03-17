@extends('layouts.app')
@section('title', 'Edit Paving')
@section('heading', 'Edit Paving')
@section('body')
  <form action="{{ route('paving.update', ['paving' => $paving]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3 mb-2">
        <label for="jenis">Jenis</label>
        <input type="text" value="{{ $paving->jenis }}" class="form-control" name="jenis" placeholder="Jenis"
          id="jenis">
        @error('jenis')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-3 mb-2">
        <label for="stok">Stok</label>
        <input type="tel" value="{{ $paving->stok }}" class="form-control" name="stok" placeholder="Stok" id="stok">
        @error('stok')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-3 mb-2">
        <label for="ukuran">Ukuran (cm)</label>
        <input type="text" value="{{ $paving->ukuran }}" class="form-control" name="ukuran" placeholder="Ukuran"
          id="ukuran">
        @error('ukuran')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-3 mb-2">
        <label for="harga">Harga (Rp)</label>
        <input type="tel" value="{{ $paving->harga }}" class="form-control" name="harga" placeholder="Harga"
          id="harga">
        @error('harga')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-lg-9 mb-2">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" value="{{ $paving->deskripsi }}" class="form-control" name="deskripsi"
          placeholder="Deskripsi" id="deskripsi">
        @error('deskripsi')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-3 mb-2">
        <label for="satuan">Satuan</label>
        <input type="text" value="{{ $paving->satuan }}" class="form-control" name="satuan" placeholder="Satuan"
          id="satuan">
        @error('satuan')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="gambar">Gambar</label>
        <input type="file" class="form-control" name="gambar" id="gambar">
        @error('gambar')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="semen">Banyak Semen yang Dibutuhkan (sak)</label>
        <input type="tel" id="semen" value="{{ $paving->bahan_baku[0]->bahan_baku->jumlah }}" class="form-control"
          name="semen" placeholder="Banyak Semen yang Dibutuhkan (sak)">
        @error('semen')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="abu_batu">Banyak Abu Batu yang Dibutuhkan (m2)</label>
        <input type="tel" id="abu_batu" value="{{ $paving->bahan_baku[1]->bahan_baku->jumlah }}" class="form-control"
          name="abu_batu" placeholder="Banyak Abu batu yang Dibutuhkan (m2)">
        @error('abu_batu')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-3 mb-2">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection
