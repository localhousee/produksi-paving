@extends('layouts.app')
@section('title', 'Tambah Transaksi Beli')
@section('heading', 'Tambah Transaksi Beli')
@section('body')
<form action="{{ route('transaksi-beli.store') }}" method="post">
  @csrf
  <div class="row">
    <div class="col-12">
      <input type="text" name="no_nota" class="form-control" placeholder="No Nota">
      @error('no_nota') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <select name="supplier_id" class="form-control">
        @foreach ($supplier as $p)
          <option value="{{ $p->id }}">{{ $p->nama_supplier }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-12">
      <select name="bahan_baku_id" class="form-control">
        @foreach ($bahan_baku as $p)
          <option value="{{ $p->id }}">{{ $p->jenis }} </option>
        @endforeach
      </select>
    </div>
    <div class="col-12">
      <input type="tel" name="qty" class="form-control" placeholder="qty">
      @error('qty') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" name="harga" class="form-control" placeholder="harga">
      @error('harga') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" name="subtotal" class="form-control" placeholder="subtotal">
      @error('subtotal') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="date" name="tgl_transaksi" class="form-control">
    </div>
    <div class="col-12">
      <input type="tel" name="total" class="form-control" placeholder="total">
      @error('total') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
@endsection