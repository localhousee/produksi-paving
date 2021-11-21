@extends('layouts.app')
@section('title', 'Edit Transaksi Jual')
@section('heading', 'Edit Transaksi Jual')
@section('body')
<form action="{{ route('transaksi-jual.update', ['transaksi_jual' => $transaksi]) }}" method="post">
  @csrf
  @method('put')
  <div class="row">
    <input type="hidden" name="paving_id" value="{{ $transaksi->paving[0]->id }}">
    <div class="col-12">
      <input type="tel" value="{{ $transaksi->paving[0]->paving->qty }}" name="qty" class="form-control" placeholder="qty">
      @error('no_nota') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" value="{{ $transaksi->paving[0]->paving->harga }}" name="harga" class="form-control" placeholder="harga">
      @error('harga') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" value="{{ $transaksi->paving[0]->paving->subtotal }}" name="subtotal" class="form-control" placeholder="subtotal">
      @error('subtotal') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="date" value="{{ $transaksi->tgl_transaksi }}" name="tgl_transaksi" class="form-control">
      @error('tgl_transaksi') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" value="{{ $transaksi->metode_bayar }}" name="metode_bayar" class="form-control" placeholder="metode bayar">
      @error('metode_bayar') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" value="{{ $transaksi->total }}" name="total" class="form-control" placeholder="total">
      @error('total') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" value="{{ $transaksi->status }}" name="status" class="form-control" placeholder="status">
      @error('status') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
@endsection