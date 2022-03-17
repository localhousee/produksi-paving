@extends('layouts.app')
@section('title', 'Tambah Keranjang')
@section('heading', 'Tambah Keranjang')
@section('body')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <form action="{{ route('keranjang-jual.store') }}" method="post">
    <div class="row">
      @csrf
      <div class="col-12 col-md-4 mb-2">
        <select name="paving_id" class="form-control" id="paving">
          @foreach ($paving as $p)
            <option value="{{ $p->id }}">{{ $p->jenis }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-12 col-md-4 mb-2">
        <input type="tel" name="qty" class="form-control" placeholder="Jumlah">
      </div>
      <div class="col-12 col-md-4 mb-2">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="{{ route('transaksi-jual.create') }}" class="btn btn-success ml-4">
          Bayar
        </a>
      </div>
    </div>
  </form>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Paving</th>
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
          <td>{{ $k->paving->qty }}</td>
          <td>{{ format_money($k->paving->subtotal) }}</td>
          <td>
            <a href="{{ route('keranjang-jual.edit', ['keranjang_jual' => $k->paving->id]) }}"
              class="text-primary nav-link">
              Edit
            </a>
          </td>
          <td>
            <x-modal :pointer="$k->id" :route="route('keranjang-jual.destroy', ['keranjang_jual' => $k->paving->id])">
            </x-modal>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
