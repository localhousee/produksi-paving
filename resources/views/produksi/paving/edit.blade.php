@extends('layouts.app')
@section('title', 'Edit Produksi Paving')
@section('heading', 'Edit Produksi Paving')
@section('body')
  <form action="{{ route('produksi.paving.update', ['produksi' => $produksi, 'paving' => $paving]) }}" method="post">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-12 col-md-6 mb-2">
        <label for="jumlah">Jumlah Produksi</label>
        <input type="tel" value="{{ $paving->paving->jumlah_produksi }}" class="form-control" name="jumlah_produksi">
        @error('jumlah_produksi')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection
