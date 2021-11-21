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
        <th>Harga Satuan</th>
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
          <td>{{ $b->harga_satuan }}</td>
          <td>{{ $b->stok }}</td>
          <td>{{ $b->satuan }}</td>
          <td><a href="{{ route('bahan-baku.edit', ['bahan_baku' => $b]) }}" class="text-primary nav-link">Edit</a></td>
          <td>
            <a class="text-danger nav-link" href="#" data-toggle="modal" data-target="#delete{{ $b->id }}">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Hapus
            </a>
            <!-- Logout Modal-->
            <div class="modal fade" id="delete{{ $b->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{ route('bahan-baku.destroy', ['bahan_baku' => $b]) }}" method="post">
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