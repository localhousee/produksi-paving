@extends('layouts.app')
@section('title', 'Tambah Transaksi Jual')
@section('heading', 'Tambah Transaksi Jual')
@section('body')
  <form action="{{ route('transaksi-jual.store') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12 col-md-6 mb-2">
        <label for="pembeli_id">Pembeli</label>
        <select name="pembeli_id" id="pembeli_id" class="form-control">
          @foreach ($pembeli as $p)
            <option value="{{ $p->id }}">{{ $p->nama }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-12 col-md-6 mb-2">
        <label for="tgl_transaksi">Tanggal Transaksi</label>
        <input type="date" value="{{ $transaksi->tgl_transaksi }}" name="tgl_transaksi" id="tgl_transaksi"
          class="form-control">
        @error('tgl_transaksi')
          <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 mb-2">
        <label for="total">Total Harga</label>
        <input type="tel" value="{{ format_money($total) }}" id="total" name="total" id="total" class="form-control"
          placeholder="total" readonly id="total">
        @error('total')
          <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 mb-2">
        <label for="bayar">Dibayar</label>
        <input type="tel" value="{{ $transaksi->bayar }}" name="bayar" id="bayar" class="form-control" id="bayar">
        @error('bayar')
          <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12 col-md-6 mb-2">
        <label for="status">Status Pembayaran</label>
        <select name="status" id="status" class="form-control">
          <option value="DP" onclick="setText(0)">DP</option>
          <option value="lunas" onclick="setText(1)">Lunas</option>
        </select>
        @error('status')
          <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
@endsection

@section('scripts')
  <script type="text/javascript">
    function setText(value) {
      var input = document.getElementById('total');
      var total = input.value;
      var bayar = document.getElementById("bayar");
      if (value == 1) {
        bayar.value = total;
      } else {
        bayar.value = 0;
      }
    }
  </script>
@endsection
