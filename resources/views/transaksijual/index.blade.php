@extends('layouts.app')
@section('title', 'Transaksi Jual')
@section('heading', 'Transaksi Jual')
@section('body')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a class="btn btn-primary mb-2" href="{{ route('keranjang-jual.create') }}">Tambah</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>No Nota</th>
                <th>Status</th>
                <th colspan="2">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->tgl_transaksi }}</td>
                    <td>{{ $t->no_nota }}</td>
                    <td>{{ ucfirst($t->status) }}</td>
                    <td><a class="text-success nav-link"
                            href="{{ route('transaksi-jual.show', ['transaksi_jual' => $t->id]) }}">Detail</a></td>
                    <td>
                        @if ($t->status !== 'lunas')
                            <a class="text-primary nav-link"
                                href="{{ route('transaksi-jual.edit', ['transaksi_jual' => $t->id]) }}">Lunas</a>
                        @endif
                    </td>
                    <td>
                        <x-modal :pointer="$t->id" :route="route('transaksi-jual.destroy', ['transaksi_jual' => $t])"></x-modal>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $transaksi->links() }}
@section('report')
    <x-report type="Penjualan" />
@endsection
@endsection
