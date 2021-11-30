@extends('layouts.master')
@section('title', 'Dashboard Kasir')

@section('content')

<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Dashboard Kasir</h1>
        </div>


        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Order Statistics -
                            <div class="dropdown d-inline">
                                <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#"
                                    id="orders-month">August</a>
                                <ul class="dropdown-menu dropdown-menu-sm">
                                    <li class="dropdown-title">Select Month</li>
                                    <li><a href="#" class="dropdown-item">January</a></li>
                                    <li><a href="#" class="dropdown-item">February</a></li>
                                    <li><a href="#" class="dropdown-item">March</a></li>
                                    <li><a href="#" class="dropdown-item">April</a></li>
                                    <li><a href="#" class="dropdown-item">May</a></li>
                                    <li><a href="#" class="dropdown-item">June</a></li>
                                    <li><a href="#" class="dropdown-item">July</a></li>
                                    <li><a href="#" class="dropdown-item active">August</a></li>
                                    <li><a href="#" class="dropdown-item">September</a></li>
                                    <li><a href="#" class="dropdown-item">October</a></li>
                                    <li><a href="#" class="dropdown-item">November</a></li>
                                    <li><a href="#" class="dropdown-item">December</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{count($baru)}}</div>
                                <div class="card-stats-item-label">Baru</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{count($proses)}}</div>
                                <div class="card-stats-item-label">Proses</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">{{count($selesai)}}</div>
                                <div class="card-stats-item-label">Selesai</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
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
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-chart">
                        <canvas id="balance-chart" height="80"></canvas>
                    </div>
                    <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pemasukan</h4>
                        </div>
                        <div class="card-body">
                            $187,13
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
                                                class="fas fa-caret-up"></i></span>
                                        7%</span>
                                    <div class="detail-value">$243</div>
                                    <div class="detail-name">Transaksi hari ini</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-danger"><i
                                                class="fas fa-caret-down"></i></span>
                                        23%</span>
                                    <div class="detail-value">$2,902</div>
                                    <div class="detail-name">Transaksi minggu ini</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span>9%</span>
                                    <div class="detail-value">$12,821</div>
                                    <div class="detail-name">Transaksi bulan ini</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span>
                                        19%</span>
                                    <div class="detail-value">$92,142</div>
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
                                        <div class="rounded card-icon bg-primary col-2" width="50">
                                            <i class="fas fa-store-alt"></i>
                                        </div>
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
<script src="{{ asset('assets/modules/chart.min.js') }}"></script>
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

    var balance_chart = document.getElementById("balance-chart").getContext('2d');

    var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
    balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
    balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

    var myChart1 = new Chart(balance_chart, {
        type: 'line',
        data: {
            labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018',
                '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018',
                '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'
            ],
            datasets: [{
                label: "This will be hide",
                data: [50, 61, 80, 50, 72, 52, 60, 41, 30, 45, 70, 40, 93, 63, 50, 62],
                backgroundColor: balance_chart_bg_color,
                borderWidth: 3,
                borderColor: 'rgba(63,82,227,1)',
                pointBorderWidth: 0,
                pointBorderColor: 'transparent',
                pointRadius: 3,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(63,82,227,1)',
                tension: 0.1
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
            },
            layout: {
                    padding: {
                        bottom: -1,
                        left: -1
                    }
                },
            scales: {
                y: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                    },
                    ticks: {
                        display: false
                    }
                }
            },
        }
    });

</script>
@endpush
