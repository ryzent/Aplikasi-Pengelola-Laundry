@extends('layouts.master')
@section('title', 'Manajemen Toko')

@section('content')

    <div class="main-content">
        <section class="section" style="margin-top: 0px">
            <div class="section-header">
                <h1>Tambah cabang toko baru</h1>
            </div>


            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                <form action="{{ route('manajemen_outlet.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                          <label>Nama Cabang</label>
                          <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Alamat Cabang</label>
                            <input type="text" class="form-control" name="alamat">
                          </div>
                        <div class="form-group">
                          <label>Nomor Telepon</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-phone"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number" name="tlp">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                      </div>
                </form>
                </div>
                </div>
            </div>
        </section>
    </div>

@endsection
