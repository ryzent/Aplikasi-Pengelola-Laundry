<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Keuangan</title>
        <!-- General CSS Files -->

        <link href=" {{ mix('css/app.css') }}" rel="stylesheet">

        <!-- CSS Libraries -->


        <!-- Template CSS -->
        {{-- <link rel="stylesheet" href=" {{ URL::asset('assets/css/style.css') }} ">
        <link rel="stylesheet" href="  {{ URL::asset('assets/css/components.css') }}"> --}}

</head>

<body>

    <center>
        <h2>Laporan Keuangan</h2>
        <h4>{{config('app.name')}}</h4>
        <h4>Bulan {{$bulan_full}} Tahun {{$tahun}}</h4>
    </center>
    <hr>

    <div class="col-12 col-md-12 col-lg-12">
        <div class="mx-auto col-9 table-responsive">
            <h5>Total Pendapatan: Rp {{ number_format($pendapatan, 0, ',', '.') }}</h5>
    <table id="transaksi-table" class="table table-striped" width="100%" collspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Invoice</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Bayar</th>
                <th>Pemasukan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <th>{{ $item->kode_invoice}} </th>
                <th>{{ date('Y-m-d', strtotime($item->tgl_masuk))}} </th>
                <th>{{ date('Y-m-d', strtotime($item->tgl_bayar))}} </th>
                <th>{{ $item->total_bayar}} </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
</body>

</html>
