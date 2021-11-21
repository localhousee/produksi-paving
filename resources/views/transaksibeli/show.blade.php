@extends('layouts.app')
@section('title', 'Detail Transaksi')
@section('heading', 'Detail Transaksi')
@section('body')
  <table class="table">
    <tr>
      <td>No Nota</td>
      <td>: {{ $transaksi->no_nota }}</td>
    </tr>
    <tr>
      <td>Supplier</td>
      <td>: {{ $transaksi->supplier->nama_supplier }}</td>
    </tr>
    <tr>
      <td>Tgl Transaksi</td>
      <td>: {{ $transaksi->tgl_transaksi }}</td>
    </tr>
    <tr>
      <td>Bahan Baku</td>
      <td>: {{ $transaksi->bahan_baku[0]->jenis }}</td>
    </tr>
    <tr>
      <td>Qty</td>
      <td>: {{ $transaksi->bahan_baku[0]->bahan_baku->qty }}</td>
    </tr>
    <tr>
      <td>Harga</td>
      <td>: {{ $transaksi->bahan_baku[0]->bahan_baku->harga }}</td>
    </tr>
    <tr>
      <td>Subtotal</td>
      <td>: {{ $transaksi->bahan_baku[0]->bahan_baku->subtotal }}</td>
    </tr>
    <tr>
      <td>Total</td>
      <td>: {{ $transaksi->total }}</td>
    </tr>
  </table>
@endsection