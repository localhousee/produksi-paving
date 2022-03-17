@extends('layouts.app')
@section('title', 'Edit Produksi')
@section('heading', 'Edit Produksi')
@section('body')
  <form action="{{ route('produksi.update', ['produksi' => $produksi]) }}" method="post">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-12 col-md-6 mb-2">
        <label for="tanggal">Tanggal Produksi</label>
        <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $produksi->tanggal }}">
        @error('tanggal')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection
