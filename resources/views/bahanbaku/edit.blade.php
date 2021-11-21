@extends('layouts.app')
@section('title', 'Edit Bahan Baku')
@section('heading', 'Edit Bahan Baku')
@section('body')
  <form action="{{ route('bahan-baku.update', ['bahan_baku' => $bahanBaku]) }}" method="post">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-12">
        <select name="jenis" class="form-control">
          <option value="abu batu" {{ $bahanBaku->jenis !== 'abu batu' ?: 'selected' }}>Abu batu</option>
          <option value="semen" {{ $bahanBaku->jenis !== 'semen' ?: 'selected' }}>Semen</option>
        </select>
        @error('jenis') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="text" value="{{ $bahanBaku->merk }}" class="form-control" name="merk" placeholder="Merk">
        @error('merk') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="tel" value="{{ $bahanBaku->harga_satuan }}" class="form-control" name="harga_satuan" placeholder="Harga satuan">
        @error('harga_satuan') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="tel" value="{{ $bahanBaku->stok }}" class="form-control" name="stok" placeholder="Stok">
        @error('stok') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <select name="satuan" class="form-control">
          <option value="m3" {{ $bahanBaku->satuan !== 'm3' ?: 'selected' }}>m3</option>
          <option value="sak" {{ $bahanBaku->satuan !== 'sak' ?: 'selected' }}>Sak</option>
        </select>
        @error('satuan') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection