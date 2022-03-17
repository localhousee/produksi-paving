@extends('layouts.app')
@section('title', 'Daftar Produksi Paving')
@section('heading', 'Daftar Produksi Paving')
@section('body')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <a href="{{ route('produksi.paving.create', ['produksi' => $produksi]) }}" class="btn btn-primary mb-2">Tambah</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Jenis</th>
        <th>Jumlah Produksi</th>
        <th colspan="2">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @if ($paving)
        @foreach ($paving as $p)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->jenis }}</td>
            <td>{{ $p->paving->jumlah_produksi }}</td>
            <td><a href="{{ route('produksi.paving.edit', ['produksi' => $produksi, 'paving' => $p]) }}"
                class="text-primary nav-link">Edit</a></td>
            <td>
              <x-modal :pointer="$p->id"
                :route="route('produksi.paving.destroy', ['produksi' => $produksi, 'paving' => $p->id])"></x-modal>
            </td>
          </tr>
        @endforeach
      @endif
    </tbody>
  </table>
  {{ empty($paving) ?: $paving->links() }}
@endsection
