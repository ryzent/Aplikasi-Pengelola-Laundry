@extends('layouts.master')
@section('title', 'Transaksi')

@section('content')

<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Transaksi</h1>
        </div>


        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Toko</label>
                            <input type="text" class="form-control" name="toko">
                        </div>
                        <div class="form-group">
                            <label>Kode Invoice</label>
                            <input type="text" class="form-control" name="kode_invoice">
                        </div>
                        <div class="section-title mt-0">Member</div>
                        <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="memberCheck"
                                onclick="(this.checked) ? document.getElementById('id_member').disabled = false : document.getElementById('id_member').disabled = true;">
                            <label class="custom-control-label" for="memberCheck">Aktifkan jika punya kartu
                                member</label>
                            <input type="text" class="form-control" id="id_member" name="id_member" disabled>
                        </div>
                        <div class="form-group">
                            <label>Date Picker</label>
                            <input type="text" class="form-control datepicker">
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Tanggal barang masuk</label>
                                <input type="date" class="form-control datepicker">
                            </div>
                            <div class="form-group  col-6">
                                <label>Batas waktu</label>
                                <input type="date" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Biaya tambahan</label>
                            <input type="text" class="form-control" name="biaya_tambahan">
                        </div>
                        <div class="form-group">
                            <label>Diskon</label>
                            <input type="text" class="form-control" name="diskon">
                        </div>
                        <div class="form-group">
                            <label>Pajak</label>
                            <input type="text" class="form-control" name="pajak">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2" name="status">
                                <option>Baru</option>
                                <option>Proses</option>
                                <option>Selesai</option>
                                <option>Diambil</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Dibayar</label>
                            <select class="form-control select2" name="bayar">
                                <option>Belum Dibayar</option>
                                <option>Sudah Dibayar</option>
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
                                <input type="text" class="form-control phone-number" name="tlp">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('addon-script')
{{-- <link rel="stylesheet" href="../node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<script>
    $(function () {
        $('.datepicker').datepicker();
    });

</script> --}}
@endpush
