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
                    <form action="{{ route('manajemen_produk.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" name="nama_paket">
                            </div>
                            <div class="form-group">
                                <label>Harga Produk</label>
                                <input type="text" class="form-control" name="harga">
                            </div>
                            <div class="form-group">
                                <label>Jenis Produk</label>
                                <select class="form-control" name="jenis">
                                    <option value="kiloan">Kiloan</option>
                                    <option value="selimut">Selimut</option>
                                    <option value="bed_cover">Bed Cover</option>
                                    <option value="kaos">Kaos</option>
                                    <option value="lain">Lain-lain</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Cabang Toko</label>
                                <select class="form-control" name="id_outlet">
                                    @foreach ($toko as $tk)
                                    <option value="{{$tk->id}}">{{$tk->nama}}</option>
                                    @endforeach

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
