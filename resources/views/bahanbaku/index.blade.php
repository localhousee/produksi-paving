@extends('layouts.app')
@section('title', 'Daftar Bahan Baku')
@section('heading', 'Daftar Bahan Baku')
@section('body')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <a href="{{ route('bahan-baku.create') }}" class="btn btn-primary mb-2">Tambah</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Jenis</th>
        <th>Merk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Satuan</th>
        <th colspan="2">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($bahanbaku as $b)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $b->jenis }}</th>
          <td>{{ $b->merk }}</td>
          <td>{{ $b->harga }}</td>
          <td>{{ $b->stok }}</td>
          <td>{{ $b->satuan }}</td>
          <td><a href="{{ route('bahan-baku.edit', ['bahan_baku' => $b]) }}" class="text-primary nav-link">Edit</a></td>
          <td>
            <x-modal :pointer="$b->id" :route="route('bahan-baku.destroy', ['bahan_baku'=>$b])"></x-modal>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $bahanbaku->links() }}
@endsection
