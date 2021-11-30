@extends('layouts.master')
@section('title', 'Dashboard Admin')

@section('content')

<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Dashboard Admin</h1>
        </div>


        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-store-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Cabang</h4>
                        </div>
                        <div class="card-body">
                            {{$toko}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-tags"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Produk</h4>
                        </div>
                        <div class="card-body">
                            {{count($produk)}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pegawai</h4>
                        </div>
                        <div class="card-body">
                            {{$user}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-cash-register"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Transaksi</h4>
                        </div>
                        <div class="card-body">
                            {{count($transaksi)}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistik</h4>
                        <div class="card-header-action">
                            <div class="btn-group">
                                <a href="#" class="btn btn-primary">Minggu ini</a>
                                <a href="#" class="btn">Bulan ini</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" height="182"></canvas>
                        <div class="statistic-details mt-sm-4">
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i
                                            class="fas fa-caret-up"></i></span> 7%</span>
                                <div class="detail-value">Rp {{ number_format($today, 0, ',', '.') }}</div>
                                <div class="detail-name">Transaksi hari ini</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-danger"><i
                                            class="fas fa-caret-down"></i></span> 23%</span>
                                <div class="detail-value">Rp {{ number_format($week, 0, ',', '.') }}</div>
                                <div class="detail-name">Transaksi minggu ini</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i
                                            class="fas fa-caret-up"></i></span>9%</span>
                                <div class="detail-value">Rp {{ number_format($month, 0, ',', '.') }}</div>
                                <div class="detail-name">Transaksi bulan ini</div>
                            </div>
                            <div class="statistic-details-item">
                                <span class="text-muted"><span class="text-primary"><i
                                            class="fas fa-caret-up"></i></span> 19%</span>
                                <div class="detail-value">Rp {{ number_format($year, 0, ',', '.') }}</div>
                                <div class="detail-name">Transaksi tahun ini</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <h4>Informasi Toko</h4>
                        <div class="card-description">Aplikasi Manajemen Laundry</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="tickets-list">

                            <a href="#" class="ticket-item">
                                <div class="row">
                                    <img class="rounded col-2" width="50"
                                        src="{{ asset('../assets/img/products/product-1-50.png')}} " alt="product">
                                    <div class="col align-self-start">
                                        <div class="ticket-title">
                                            <h4>Nama Toko</h4>
                                        </div>
                                        <div class="ticket-info">
                                            <div>{{ auth()->user()->toko['nama'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="ticket-item">
                                <div class="row">
                                    <img class="rounded col-2" width="50"
                                        src="{{ asset('../assets/img/products/product-2-50.png')}} " alt="product">
                                    <div class="col align-self-start">
                                        <div class="ticket-title">
                                            <h4>Alamat Toko</h4>
                                        </div>
                                        <div class="ticket-info">
                                            <div>{{ auth()->user()->toko['alamat']}}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="ticket-item">
                                <div class="row">
                                    <img class="rounded col-2" width="50"
                                        src="{{ asset('../assets/img/products/product-3-50.png')}} " alt="product">
                                    <div class="col align-self-start">
                                        <div class="ticket-title">
                                            <h4>Nomor telepon</h4>
                                        </div>
                                        <div class="ticket-info">
                                            <div>{{ auth()->user()->toko['tlp']}}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('addon-script')
{{-- <script src="assets/modules/chart.min.js"></script> --}}
<script>
    const ctx = document.getElementById('myChart').getContext('2d');

    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
            datasets: [{
                label: 'Pemasukan',
                data: [640, 387, 530, 302, 430, 270, 488],
                borderWidth: 5,
                borderColor: '#6777ef',
                backgroundColor: 'transparent',
                pointBackgroundColor: '#fff',
                pointBorderColor: '#6777ef',
                pointRadius: 4,
                tension: 0.1
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
            },
            scales: {
                y: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        stepSize: 150
                    }
                },
                x: {
                    grid: {
                        display: false,
                        color: '#fbfbfb',
                        lineWidth: 2
                    }
                }
            },
        }
    });

</script>
@endpush
