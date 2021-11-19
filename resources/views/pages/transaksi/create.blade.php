@extends('layouts.master')
@section('title', 'Transaksi')

@section('content')

<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Transaksi</h1>
        </div>

        <a href="{{ route('transaksi.index')}}" class="btn btn-icon icon-left btn-primary mb-4"><i
            class="fas fa-arrow-left"></i>Kembali</a>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('transaksi.store') }}"method="POST" class="needs-validation"
                    novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Toko</label>
                            <input type="text" class="form-control" name="toko" value="{{auth()->user()->toko['nama']}}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Kode Invoice</label>
                            <input type="text" class="form-control invoice-input" name="kode_invoice" readonly
                                value="{{ $invoices }}">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ (isset($transaksi)) ? $nama : '' }}">
                        </div>
                        <div class="form-group">
                            <label>Tanggal barang masuk</label>
                            <input type="date" class="form-control datepicker" name="tgl_masuk">
                        </div>
                        <div class="form-group">
                            <label>Barang</label>
                            <select class="form-control" name="barang">
                                @foreach ($produk as $pr)
                                <option value="{{$pr->id}}">{{$pr->nama_paket}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Banyak barang</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="jumlah">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="satuan">
                                            Kg
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Satuan barang</label>
                                <select class="form-control filter-satuan" name="satuan">
                                    <option value="kg">Kiloan</option>
                                    <option value="pcs">Satuan</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Tambahkan
                        </button>
                    </form>
                </div>
                {{-- <div class="card-body table-responsive-sm">
                    <table id="produk-table-transaksi" class="table table-bordered" width="100%" collspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barang</th>
                                <th>Banyak Barang</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($transaksi))
                            {{-- @for ($i = 0; $i <= count($transaksi); $i++)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$transaksi[$i]}}</td>
                                </tr>
                            @endfor
                            @foreach ($transaksi as $item)
                            @for ($i = 0; $i <= count($transaksi); $i++)


                            <tr>
                                <td>{{$loop->iteration}}</td>
                                {{-- <td>
                                    <a href="#"
                                            class="btn btn-danger">Hapus</a>
                                </td> --}}
                                {{-- <script>
                                    console.log({{$transaksi}});
                                </script>
                                <td>{{$item['barang'][$i]}}</td>
                                <td>{{$item['banyak'][$i]}}</td>
                                <td>{{$item['harga'][$i]}}</td>
                            </tr>
                            @endfor
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div> --}}
            </div>
        </div>
    </section>
</div>

@endsection

@push('addon-script')

<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">

<script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }} "></script>

<script>
    $(document).ready(function () {
        $('#produk-table-transaksi').DataTable({
            "searching": false,
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": false
        });
    });
    $('.filter-satuan').change(function () {
        if (this.value == "kg") {
            document.getElementById("satuan").innerHTML = "Kg";
        } else {
            document.getElementById("satuan").innerHTML = "Pcs";
        }
    });

</script>
@endpush
