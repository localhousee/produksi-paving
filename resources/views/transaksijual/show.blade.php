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
      <td>Bayar</td>
      <td>: {{ $transaksi->bayar }}</td>
    </tr>
    <tr>
      <td>Daftar Paving</td>
      <td>
        <table class="table">
          <tr>
            <td>Jenis</td>
            <td>Qty</td>
            <td>Subtotal</td>
          </tr>
          @foreach ($transaksi->paving as $p)
            <tr>
              <td>{{ $p->jenis }}</td>
              <td>{{ $p->paving->qty }}</td>
              <td>{{ $p->paving->subtotal }}</td>
            </tr>
          @endforeach
        </table>
      </td>
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