@extends('layouts.app')
@section('title', 'Edit Keranjang')
@section('heading', 'Edit Keranjang')
@section('body')
  <form action="{{ route('keranjang-beli.update', ['keranjang_beli' => $keranjang]) }}" method="post">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-12 col-md-6 mb-2">
        <label for="qty">Jumlah</label>
        <input type="tel" value="{{ $keranjang->qty }}" name="qty" class="form-control" id="qty">
        @error('qty')
          <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection
