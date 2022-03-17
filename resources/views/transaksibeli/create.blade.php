@extends('layouts.app')
@section('title', 'Tambah Transaksi Beli')
@section('heading', 'Tambah Transaksi Beli')
@section('body')
  @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif
  <form action="{{ route('transaksi-beli.store') }}" method="post">
    <input value="{{ $total }}" type="hidden" name="total" readonly>
    @csrf
    <div class="row">
      <div class="col-12 col-md-4 mb-2">
        <label for="nama">Nama Supplier</label>
        <select name="supplier_id" class="form-control" id="nama">
          @foreach ($supplier as $p)
            <option value="{{ $p->id }}">{{ $p->nama_supplier }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-12 col-md-4 mb-2">
        <label for="tanggal">Tanggal</label>
        <input id="tanggal" type="date" value="{{ $transaksi->tgl_transaksi }}" name="tgl_transaksi"
          class="form-control">
      </div>
      <div class="col-12 col-md-4 mb-2">
        <label for="total">Total Harga</label>
        <input type="tel" readonly disabled value="{{ format_money($total) }}" class="form-control">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection
