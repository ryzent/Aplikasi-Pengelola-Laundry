@extends('layouts.master')
@section('title', 'Manajemen Produk')

@section('content')

    <div class="main-content">
        <section class="section" style="margin-top: 0px">
            <div class="section-header">
                <h1>Tambah produk baru</h1>
            </div>



            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                <form action="#">
                    <div class="card-body">
                        <div class="form-group">
                          <label>Nama Produk</label>
                          <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Harga Produk</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jenis Produk</label>
                            <select class="form-control">
                              <option>Kiloan</option>
                              <option>Selimut</option>
                              <option>Bed Cover</option>
                              <option>Kaos</option>
                              <option>Lain-lain</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Cabang Toko</label>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
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
