@extends('layouts.app')
@section('title', 'Detail Paving')
@section('heading', 'Detail Paving')
@section('body')
  <table class="table table-hover">
    <tr>
      <td>Jenis</td>
      <td>{{ $paving->jenis }}</td>
    </tr>
    <tr>
      <td>Stok</td>
      <td>{{ $paving->stok }}</td>
    </tr>
    <tr>
      <td>Ukuran (cm)</td>
      <td>{{ $paving->ukuran }}</td>
    </tr>
    <tr>
      <td>Deskripsi</td>
      <td>{{ $paving->deskripsi }}</td>
    </tr>
    {{-- <tr>
      <td>Gambar</td>
      <td><img src="{{ $paving->gambar }}" height="20%" width="20%"></td>
    </tr> --}}
    <tr>
      <td>Harga</td>
      <td>{{ format_money($paving->harga) }}</td>
    </tr>
    <tr>
      <td>Satuan</td>
      <td>{{ $paving->satuan }}</td>
    </tr>
    @foreach ($paving->bahan_baku as $bahanBaku)
      <tr>
        <td>{{ $bahanBaku->jenis }}</td>
        <td>{{ $bahanBaku->bahan_baku->jumlah }}</td>
      </tr>
    @endforeach
  </table>
@endsection
