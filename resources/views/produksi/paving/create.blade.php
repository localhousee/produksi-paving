@extends('layouts.app')
@section('title', 'Tambah Produksi Paving')
@section('heading', 'Tambah Produksi Paving')
@section('body')
  <form action="{{ route('produksi.paving.store', ['produksi' => $produksi]) }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <select name="paving_id" class="form-control">
          @foreach ($paving as $p)
            <option value="{{ $p->id }}">{{ $p->jenis }}</option>
          @endforeach
        </select>
        @error('paving_id') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="tel" class="form-control" name="jumlah_produksi" placeholder="Jumlah Produksi">
        @error('jumlah_produksi') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <input type="tel" class="form-control" name="jumlah_bahanbaku_dipakai" placeholder="Jumlah Bahan Baku Dipakai">
        @error('jumlah_bahanbaku_dipakai') <span class="text-danger text-sm">{{ $message }}</span> @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection