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
                      <i class="far fa-user"></i>
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
                    <div class="card-icon bg-warning">
                      <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Member</h4>
                      </div>
                      <div class="card-body">
                        {{$member}}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                      <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Transaksi</h4>
                      </div>
                      <div class="card-body">
                        0
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
                            <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                            <div class="detail-value">$243</div>
                            <div class="detail-name">Transaksi hari ini</div>
                          </div>
                          <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                            <div class="detail-value">$2,902</div>
                            <div class="detail-name">Transaksi minggu ini</div>
                          </div>
                          <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                            <div class="detail-value">$12,821</div>
                            <div class="detail-name">Transaksi bulan ini</div>
                          </div>
                          <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                            <div class="detail-value">$92,142</div>
                            <div class="detail-name">Transaksi tahun ini</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>Informasi Toko</h4>
                      </div>
                      <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">

                        </ul>
                      </div>
                    </div>
                  </div>
              </div>

        </section>
    </div>

@endsection

@push('addon-script')

@endpush
