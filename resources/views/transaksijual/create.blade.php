@extends('layouts.app')
@section('title', 'Tambah Transaksi Jual')
@section('heading', 'Tambah Transaksi Jual')
@section('body')
<form action="{{ route('transaksi-jual.store') }}" method="post">
  @csrf
  <div class="row">
    <div class="col-12">
      <select name="pembeli_id" class="form-control">
        @foreach ($pembeli as $p)
          <option value="{{ $p->id }}">{{ $p->nama }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-12">
      <input type="date" value="{{ $transaksi->tgl_transaksi }}" name="tgl_transaksi" class="form-control">
      @error('tgl_transaksi') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" style="display: hidden" value="{{ $transaksi->bayar }}" name="bayar" class="form-control" placeholder="bayar" id="bayar">
      @error('bayar') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="tel" value="{{ $total }}" id="total" name="total" class="form-control" placeholder="total" readonly id="total">
      @error('total') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <input type="radio" name="status" value="lunas" onclick="setText(1);" id="lunas">Lunas
      <input type="radio" name="status" value="DP" onclick="setText(0)">DP
      @error('status') <span class="text-sm text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
@endsection

@section('scripts')
<script type="text/javascript">
  function setText(asd) {
      var txt = document.getElementById('total');
      var temp = txt.value;
      var tf = document.getElementById("bayar");
      if(asd == 1) {
        tf.value = temp;
      } else {
        tf.value = 0;
      }
  }
</script> 
@endsection