@extends('layouts.app')
@section('title', 'Daftar Paving')
@section('heading', 'Daftar Paving')
@section('body')
  @if (session('success'))
   <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <a href="{{ route('paving.create') }}" class="btn btn-primary mb-2">Tambah</a>
  <table class="table table-hover table-responsive">
    <thead>
      <tr>
        <th>No</th>
        <th>Jenis</th>
        <th>Stok</th>
        <th>Stok Biji</th>
        <th>Ukuran</th>
        <th>Harga Satuan</th>
        <th>Deskripsi</th>
        <th>Satuan</th>
        <th>Gambar</th>
        <th>Jumlah Per Palet</th>
        <th colspan="2">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($paving as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->jenis }}</th>
          <td>{{ $p->stok }}</td>
          <td>{{ $p->stok_biji }}</td>
          <td>{{ $p->ukuran }}</td>
          <td>{{ $p->harga_satuan }}</td>
          <td>{{ $p->deskripsi }}</td>
          <td>{{ $p->satuan }}</td>
          <td><img src="{{ $p->gambar }}" height="20px" width="20px"></td>
          <td>{{ $p->jumlah_per_palet }}</td>
          <td><a href="{{ route('paving.edit', ['paving' => $p]) }}" class="text-primary nav-link">Edit</a></td>
          <td>
            <a class="text-danger nav-link" href="#" data-toggle="modal" data-target="#delete{{ $p->id }}">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Hapus
            </a>
            <!-- Logout Modal-->
            <div class="modal fade" id="delete{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Apakah anda yakin?</div>
                  <div class="modal-footer">
                    <form action="{{ route('paving.destroy', ['paving' => $p]) }}" method="post">
                      @csrf
                      @method('delete')
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <button class="btn btn-primary" type="submit">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Topbar -->
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection