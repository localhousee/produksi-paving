@extends('layouts.app')
@section('title', 'Daftar Pembeli')
@section('heading', 'Daftar Pembeli')
@section('body')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <a href="{{ route('pembeli.create') }}" class="btn btn-primary mb-2">Tambah</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th colspan="2">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pembeli as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->nama }}</td>
          <td>{{ $p->alamat }}</td>
          <td>{{ $p->no_telp }}</td>
          <td><a href="{{ route('pembeli.edit', ['pembeli' => $p]) }}" class="text-primary nav-link">Edit</a></td>
          <td>
            <x-modal :pointer="$p->id" :route="route('pembeli.destroy', ['pembeli' => $p])"></x-modal>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $pembeli->links() }}
@endsection
