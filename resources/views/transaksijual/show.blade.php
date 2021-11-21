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
      <td>Pembeli</td>
      <td>: {{ $transaksi->pembeli->nama }}</td>
    </tr>
    <tr>
      <td>Tgl Transaksi</td>
      <td>: {{ $transaksi->tgl_transaksi }}</td>
    </tr>
    <tr>
      <td>Metode Bayar</td>
      <td>: {{ $transaksi->metode_bayar }}</td>
    </tr>
    <tr>
      <td>Paving</td>
      <td>: {{ $transaksi->paving[0]->jenis }}</td>
    </tr>
    <tr>
      <td>Qty</td>
      <td>: {{ $transaksi->paving[0]->paving->qty }}</td>
    </tr>
    <tr>
      <td>Harga</td>
      <td>: {{ $transaksi->paving[0]->paving->harga }}</td>
    </tr>
    <tr>
      <td>Subtotal</td>
      <td>: {{ $transaksi->paving[0]->paving->subtotal }}</td>
    </tr>
    <tr>
      <td>Total</td>
      <td>: {{ $transaksi->total }}</td>
    </tr>
    <tr>
      <td>Status</td>
      <td>: {{ $transaksi->status }}</td>
    </tr>
  </table>
@endsection