@extends('layouts.master')
@section('title', 'Manajemen Pelanggan')

@section('content')

    <div class="main-content">
        <section class="section" style="margin-top: 0px">
            <div class="section-header">
                <h1>Tambah member baru</h1>
            </div>



            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                <form action="#">
                    <div class="card-body">
                        <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control">
                              <option>Laki-Laki</option>
                              <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label>Nomor Telepon</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-phone"></i>
                              </div>
                            </div>
                            <input type="text" class="form-control phone-number">
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

