@extends('layouts.master')
@section('title', 'Manajemen Pegawai')

@section('content')

<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Tambah pegawai baru</h1>
        </div>

        <a href="{{ route('manajemen_pegawai.index')}}" class="btn btn-icon icon-left btn-primary mb-4"><i
                class="fas fa-arrow-left"></i>Kembali</a>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ route('manajemen_pegawai.store')}}" method="POST" class="needs-validation"
                        novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="text" class="form-control" name="name" required autofocus>
                                <div class="invalid-feedback">
                                    Harap isi bagian nama
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" required autofocus>
                                <div class="invalid-feedback">
                                    Harap isi bagian email
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control pwstrength"
                                        data-indicator="pwindicator" name="password" required autocomplete>
                                    <div class="invalid-feedback">
                                        Harap isi bagian password
                                    </div>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password-confirm" class="d-block">Password Confirmation</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete>
                                    <div class="invalid-feedback">
                                        Harap isi bagian konfirmasi password
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Golongan Pegawai</label>
                                <select class="form-control select2" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="owner">Pemilik</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Cabang Toko</label>
                                <select class="form-control select2" name="id_outlet">
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

@push('addon-script')
<script src="{{ asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
<script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>

<script src=" {{ asset('assets/js/page/auth-register.js') }}"></script>

@endpush
