@extends('layouts.app')
@section('title', 'Tambah Transaksi Jual')
@section('heading', 'Tambah Transaksi Jual')
@section('body')
<form action="{{ route('transaksi-jual.store') }}" method="post">
  @csrf
  <div class="row">
    <div class="col-12">
      <input type="text" name="no_nota" class="form-control" placeholder="No Nota">
      @error('no_nota') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <select name="pembeli_id" class="form-control">
        @foreach ($pembeli as $p)
          <option value="{{ $p->id }}">{{ $p->nama }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-12">
      <select name="paving_id" class="form-control">
        @foreach ($paving as $p)
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
      @error('tgl_transaksi') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" name="metode_bayar" class="form-control" placeholder="metode bayar">
      @error('metode_bayar') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" name="total" class="form-control" placeholder="total">
      @error('total') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" name="status" class="form-control" placeholder="status">
      @error('status') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
@endsection