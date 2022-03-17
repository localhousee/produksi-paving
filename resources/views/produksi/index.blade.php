@extends('layouts.app')
@section('title', 'Daftar Produksi')
@section('heading', 'Daftar Produksi')
@section('body')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <a href="{{ route('produksi.create') }}" class="btn btn-primary mb-2">Tambah</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th colspan="3">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($produksi as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->tanggal }}</td>
          <td><a href="{{ route('produksi.paving.index', ['produksi' => $p]) }}" class="text-primary nav-link">Detail</a>
          </td>
          <td><a href="{{ route('produksi.edit', ['produksi' => $p]) }}" class="text-primary nav-link">Edit</a></td>
          <td>
            <x-modal :pointer="$p->id" :route="route('produksi.destroy', ['produksi' => $p])"></x-modal>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
