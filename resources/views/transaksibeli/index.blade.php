@extends('layouts.app')
@section('title', 'Transaksi Beli')
@section('heading', 'Transaksi Beli')
@section('body')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <a class="btn btn-primary mb-2" href="{{ route('keranjang-beli.create') }}">Tambah</a>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal Transaksi</th>
        <th>No Nota</th>
        <th colspan="2">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($transaksi as $t)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $t->tgl_transaksi }}</td>
          <td>{{ $t->no_nota }}</td>
          <td><a class="text-success nav-link"
              href="{{ route('transaksi-beli.show', ['transaksi_beli' => $t]) }}">Detail</a>
          </td>
          <td>
            <x-modal :pointer="$t->id" :route="route('transaksi-beli.destroy', ['transaksi_beli' => $t])"></x-modal>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $transaksi->links() }}
@endsection
