@extends('layouts.master')
@section('title', 'Create | Manajemen Pelanggan')

@section('content')

<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Tambah member baru</h1>
        </div>

        <a href="{{ route('manajemen_pelanggan.index')}}" class="btn btn-icon icon-left btn-primary mb-4"><i
                class="fas fa-arrow-left"></i>Kembali</a>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ route('manajemen_pelanggan.store')}}" method="POST" class="needs-validation"
                        novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" required autofocus>
                                <div class="invalid-feedback">
                                    Harap isi nama lengkap
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" required autofocus>
                                <div class="invalid-feedback">
                                    Harap isi alamat
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control select2" name="jenis_kelamin">
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
                                    <input type="text" class="form-control phone-number" name="tlp" required autofocus>
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

@push('addon-script')
<script>
    $(document).ready(function () {
        $('.jenis_kelamin').select2();
    });

</script>
@endpush
