@extends('layouts.app')
@section('title', 'Edit Transaksi Jual')
@section('heading', 'Edit Transaksi Jual')
@section('body')
<form action="{{ route('transaksi-jual.update', ['transaksi_jual' => $transaksi]) }}" method="post">
  @csrf
  @method('put')
  <div class="row">
    <div class="col-12">
      <input type="tel" value="{{ $transaksi->bayar }}" name="bayar" class="form-control" placeholder="bayar">
      @error('bayar') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <p>Total: {{ $transaksi->total }}</p>
    </div>
    <div class="col-12">
      <input type="text" value="{{ $transaksi->status }}" name="status" class="form-control" placeholder="status">
      @error('status') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
@endsection