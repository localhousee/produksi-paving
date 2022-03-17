@extends('layouts.app')
@section('title', 'Tambah Keranjang')
@section('heading', 'Tambah Keranjang')
@section('body')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif
  <form action="{{ route('keranjang-beli.store') }}" method="post">
    <div class="row">
      @csrf
      <div class="col-12 col-md-4">
        <select name="bahan_baku_id" class="form-control">
          @foreach ($bahanBaku as $b)
            <option value="{{ $b->id }}">{{ $b->jenis }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-12 col-md-4">
        <input type="tel" name="qty" class="form-control" placeholder="Jumlah">
        @error('qty')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('transaksi-beli.create') }}" class="btn btn-success ml-4">
          Bayar
        </a>
      </div>
    </div>
  </form>
  <table class="table mt-2">
    <thead>
      <tr>
        <th>No</th>
        <th>Bahan Baku</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
        <th colspan="2">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($keranjang as $k)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $k->jenis }}</td>
          <td>{{ $k->bahan_baku->qty }}</td>
          <td>{{ format_money($k->bahan_baku->subtotal) }}</td>
          <td>
            <a href="{{ route('keranjang-beli.edit', ['keranjang_beli' => $k->bahan_baku->id]) }}"
              class="text-primary nav-link">
              Edit
            </a>
          </td>
          <td>
            <x-modal :pointer="$k->id" :route="route('keranjang-beli.destroy', ['keranjang_beli' => $k->bahan_baku->id])">
            </x-modal>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
