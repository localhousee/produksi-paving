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
            <td><a href="{{ route('produksi.paving.edit', ['produksi' => $produksi, 'paving' => $p]) }}" class="text-primary nav-link">Edit</a></td>
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
                      <form action="{{ route('produksi.paving.destroy', ['produksi' => $produksi, 'paving' => $p->id]) }}" method="post">
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
      @endif
    </tbody>
  </table>
@endsection