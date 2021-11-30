@extends('layouts.master')
@section('title', 'Laporan')

@section('content')

<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Laporan</h1>
        </div>


        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cetak Laporan</h4>
                    </div>
                    <div class="card-body">
                        <form action="laporan/tampilkan-laporan" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="toko" class="col-1 col-form-label">Toko</label>
                                <div class="col-2">
                                    <select class="form-control selectric" id="toko" name="toko">
                                        @if (isset($laporan))
                                            @foreach ($toko as $item )
                                                @if ($tokos == $item->id)
                                                <option selected value="{{$item->id}}">{{$item->nama}}</option>
                                                @else
                                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach ($toko as $item )
                                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bulan" class="col-1 col-form-label">Bulan</label>
                                <div class="col-2">
                                    <select class="form-control selectric" id="bulan" name="bulan">
                                        @if (isset($laporan))
                                        @foreach ($bulan as $item )
                                        @if ($bulan_num == $item->Bulan)
                                        <option selected value="{{$item->Bulan}}">{{$item->BulanFull}}</option>
                                        @else
                                        <option value="{{$item->Bulan}}">{{$item->BulanFull}}</option>
                                        @endif
                                        @endforeach
                                        @else
                                        @foreach ($bulan as $item )
                                        <option value="{{$item->Bulan}}">{{$item->BulanFull}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tahun" class="col-1 col-form-label">Tahun</label>
                                <div class="col-2">
                                    <select class="form-control selectric" id="tahun" name="tahun">
                                        @foreach ($tahun as $item )
                                        <option value="{{$item->Tahun}}">{{$item->Tahun}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="mt-3 btn btn-primary">Tampilkan</button>
                            @if (isset($laporan))
                                <a href="laporan/pdf-laporan" class="mt-3 btn btn-primary">Cetak PDF</a>
                            @endif

                        </form>
                    </div>
                    @if (isset($laporan))
                    <div class="mx-auto">
                        <h3>Laporan Keuangan Bulan {{$bulan_full}}</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <h5>Pendapatan Bulan ini: Rp {{ number_format($pendapatan, 0, ',', '.') }}</h5>
                        <table id="transaksi-table" class="table table-bordered" width="100%" collspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Invoice</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Pemasukan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laporan as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->kode_invoice}} </td>
                                    <td>{{ date('Y-m-d', strtotime($item->tgl_masuk))}} </td>
                                    <td>{{ date('Y-m-d', strtotime($item->tgl_bayar))}} </td>
                                    <td>{{ $item->total_bayar}} </td>
                                    <td class="">
                                        @if ($item->id_status == 3)
                                        <div class="badge badge-success">Selesai</div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                        <p> Muat ulang halaman untuk melakukan reset.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('addon-script')
<script>
    $(document).ready(function () {
        if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
                {{Session::forget('laporan')}}
            }
        $('#transaksi-table').DataTable({
            "searching": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true

        });
    });

</script>
@endpush
