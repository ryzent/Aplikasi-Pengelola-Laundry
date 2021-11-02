@extends('layouts.master')
@section('title', 'Manajemen Toko')

@section('content')

<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Tambah cabang toko baru</h1>
        </div>

        <a href="{{ route('manajemen_outlet.index')}}" class="btn btn-icon icon-left btn-primary mb-4"><i
                class="fas fa-arrow-left"></i>Kembali</a>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ route('manajemen_outlet.update', $toko->id)}}" method="POST" class="needs-validation"
                        novalidate="" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Cabang</label>
                                <input type="text" class="form-control" name="nama" required autofocus value="{{ $toko->nama ?? old('nama') }}">
                                <div class="invalid-feedback">
                                    Harap isi nama cabang
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat Cabang</label>
                                <input type="text" class="form-control" name="alamat" required autofocus value="{{ $toko->alamat ?? old('alamat') }}">
                                <div class="invalid-feedback">
                                    Harap isi alamat cabang
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control phone-number" name="tlp" required autofocus value="{{ $toko->tlp ?? old('tlp') }}">
                                    <div class="invalid-feedback">
                                        Harap isi nomor telepon
                                    </div>
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
