@extends('layouts.app')
@section('title', 'Tambah Keranjang')
@section('heading', 'Tambah Keranjang')
@section('body')
  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <form action="{{ route('keranjang-jual.store') }}" method="post">
    <div class="row">
        @csrf
        <div class="col">
          <select name="paving_id" class="form-control">
            @foreach ($paving as $p)
              <option value="{{ $p->id }}">{{ $p->jenis }}</option>
            @endforeach
          </select>
        </div>
        <div class="col">
          <input type="tel" name="qty" class="form-control" placeholder="qty">
        </div>
        <div class="col">
          <input type="submit" value="Simpan" class="btn btn-primary">
        </div>
      </div>
  </form>
  <div class="row mt-4">
    <div class="col">
      <a href="{{ route('transaksi-jual.create') }}" class="btn btn-success">
        Bayar
      </a>
    </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Paving</th>
        <th>Qty</th>
        <th>Subtotal</th>
        <th colspan="2">Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($keranjang as $k)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $k->jenis }}</td>
          <td>{{ $k->paving->qty }}</td>
          <td>{{ $k->paving->subtotal }}</td>
          <td>
            <a href="{{ route('keranjang-jual.edit', ['keranjang_jual' => $k]) }}" class="text-primary">
              Edit
            </a>
          </td>
          <td>
            <a class="text-danger nav-link" href="#" data-toggle="modal" data-target="#delete{{ $k->id }}">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Hapus
            </a>
            <!-- Logout Modal-->
            <div class="modal fade" id="delete{{ $k->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{ route('keranjang-jual.destroy', ['keranjang_jual' => $k]) }}" method="post">
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