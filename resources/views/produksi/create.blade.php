@extends('layouts.app')
@section('title', 'Tambah Produksi')
@section('heading', 'Tambah Produksi')
@section('body')
  <form action="{{ route('produksi.store') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <input type="date" class="form-control" name="tanggal">
        @error('tanggal') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection