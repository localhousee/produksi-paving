@extends('layouts.app')
@section('title', 'Tambah Produksi Paving')
@section('heading', 'Tambah Produksi Paving')
@section('body')
  <form action="{{ route('produksi.paving.store', ['produksi' => $produksi]) }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12 col-md-6 mb-2">
        <label for="paving">Jenis Paving</label>
        <select name="paving_id" class="form-control" id="paving">
          @foreach ($paving as $p)
            <option value="{{ $p->id }}">{{ $p->jenis }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-12 col-md-6 mb-2">
        <label for="jumlah">Jumlah Produksi</label>
        <input type="tel" id="jumlah" class="form-control" name="jumlah_produksi">
        @error('jumlah_produksi')
          <span class="text-danger text-sm">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection
