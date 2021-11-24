@extends('layouts.app')
@section('title', 'Tambah Transaksi Beli')
@section('heading', 'Tambah Transaksi Beli')
@section('body')
<form action="{{ route('transaksi-beli.store') }}" method="post">
  @csrf
  <div class="row">
    <div class="col-12">
      <select name="supplier_id" class="form-control">
        @foreach ($supplier as $p)
          <option value="{{ $p->id }}">{{ $p->nama_supplier }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-12">
      <input type="date" value="{{ $transaksi->tgl_transaksi }}" name="tgl_transaksi" class="form-control">
    </div>
    <div class="col-12">
      <input value="{{ $total }}" type="tel" name="total" class="form-control" placeholder="total" readonly>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
@endsection