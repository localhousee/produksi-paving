@extends('layouts.app')
@section('title', 'Edit Bahan Baku')
@section('heading', 'Edit Bahan Baku')
@section('body')
  <form action="{{ route('bahan-baku.update', ['bahan_baku' => $bahanBaku]) }}" method="post">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="jenis">Jenis</label>
        <select name="jenis" id="jenis" class="form-control">
          <option value="abu batu" {{ $bahanBaku->jenis !== 'abu batu' ?: 'selected' }}>Abu batu</option>
          <option value="semen" {{ $bahanBaku->jenis !== 'semen' ?: 'selected' }}>Semen</option>
        </select>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="merk">Merk</label>
        <input type="text" value="{{ $bahanBaku->merk }}" class="form-control" name="merk" id="merk"
          placeholder="Merk">
        @error('merk')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="harga">Harga</label>
        <input type="tel" value="{{ $bahanBaku->harga }}" class="form-control" name="harga" id="harga"
          placeholder="Harga satuan">
        @error('harga')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="stok">Stok</label>
        <input type="tel" value="{{ $bahanBaku->stok }}" class="form-control" name="stok" id="stok"
          placeholder="Stok">
        @error('stok')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-2">
        <label for="satuan">Satuan</label>
        <select name="satuan" id="satuan" class="form-control">
          <option value="m3" {{ $bahanBaku->satuan !== 'm3' ?: 'selected' }}>m3</option>
          <option value="sak" {{ $bahanBaku->satuan !== 'sak' ?: 'selected' }}>Sak</option>
        </select>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection
