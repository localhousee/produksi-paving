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
      <td>
        <table class="table">
          <tr>
            <td>Jenis</td>
            <td>Jumlah</td>
            <td>Subtotal</td>
          </tr>
          @foreach ($transaksi->bahan_baku as $b)
            <tr>
              <td>{{ $b->jenis }}</td>
              <td>{{ $b->bahan_baku->qty }}</td>
              <td>{{ format_money($b->bahan_baku->subtotal) }}</td>
            </tr>
          @endforeach
        </table>
      </td>
    </tr>
    <tr>
      <td>Total</td>
      <td>: {{ format_money($transaksi->total) }}</td>
    </tr>
  </table>
@endsection
