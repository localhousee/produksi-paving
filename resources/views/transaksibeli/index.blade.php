@extends('layouts.app')
@section('title', 'Transaksi Beli')
@section('heading', 'Transaksi Beli')
@section('body')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <a class="btn btn-primary" href="{{ route('transaksi-beli.create') }}">Tambah</a>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>No Nota</th>
        <th colspan="2">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($transaksi as $t)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $t->no_nota }}</td>
          <td><a class="text-success" href="{{ route('transaksi-beli.show', ['transaksi_beli' => $t]) }}">Detail</a></td>
          <td><a class="text-primary" href="{{ route('transaksi-beli.edit', ['transaksi_beli' => $t]) }}">Edit</a></td>
          <td>
            <a class="text-danger nav-link" href="#" data-toggle="modal" data-target="#delete{{ $t->id }}">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Hapus
            </a>
            <!-- Logout Modal-->
            <div class="modal fade" id="delete{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{ route('transaksi-beli.destroy', ['transaksi_beli' => $t]) }}" method="post">
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