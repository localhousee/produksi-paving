@extends('layouts.app')
@section('title', 'Daftar Supplier')
@section('heading', 'Daftar Supplier')
@section('body')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <a href="{{ route('supplier.create') }}" class="btn btn-primary mb-2">Tambah</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th colspan="2">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($supplier as $s)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $s->nama_supplier }}</td>
          <td>{{ $s->jenis_supplier }}</td>
          <td>{{ $s->alamat_supplier }}</td>
          <td>{{ $s->no_telp }}</td>
          <td><a href="{{ route('supplier.edit', ['supplier' => $s]) }}" class="text-primary nav-link">Edit</a></td>
          <td>
            <x-modal :pointer="$s->id" :route="route('supplier.destroy', ['supplier' => $s])"></x-modal>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $supplier->links() }}
@endsection
