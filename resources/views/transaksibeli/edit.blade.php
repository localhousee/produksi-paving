@extends('layouts.app')
@section('title', 'Edit Transaksi Beli')
@section('heading', 'Edit Transaksi Beli')
@section('body')
<form action="{{ route('transaksi-beli.update', ['transaksi_beli' => $transaksi]) }}" method="post">
  @csrf
  @method('put')
  <div class="row">
    <input type="hidden" name="bahan_baku_id" value="{{ $transaksi->bahan_baku[0]->id }}">
    <div class="col-12">
      <input type="tel" value="{{ $transaksi->bahan_baku[0]->bahan_baku->qty }}" name="qty" class="form-control" placeholder="qty">
      @error('no_nota') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" value="{{ $transaksi->bahan_baku[0]->bahan_baku->harga }}" name="harga" class="form-control" placeholder="harga">
      @error('harga') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" value="{{ $transaksi->bahan_baku[0]->bahan_baku->subtotal }}" name="subtotal" class="form-control" placeholder="subtotal">
      @error('subtotal') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="date" value="{{ $transaksi->tgl_transaksi }}" name="tgl_transaksi" class="form-control">
      @error('tgl_transaksi') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" value="{{ $transaksi->total }}" name="total" class="form-control" placeholder="total">
      @error('total') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
@endsection