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
            <a class="text-danger nav-link" href="#" data-toggle="modal" data-target="#delete{{ $s->id }}">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Hapus
            </a>
            <!-- Logout Modal-->
            <div class="modal fade" id="delete{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{ route('supplier.destroy', ['supplier' => $s]) }}" method="post">
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