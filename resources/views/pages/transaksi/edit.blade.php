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
                    {{-- <form action="{{ route('transaksi.update', $transaksi->id)}}" method="POST"
                        class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label>Toko</label>
                                <input type="text" class="form-control" name="toko">
                            </div>
                            <div class="form-group">
                                <label>Kode Invoice</label>
                                <input type="text" class="form-control" name="kode_invoice">
                            </div>
                            <div class="form-group">
                                <label>Member</label>
                                <input type="text" class="form-control" name="kode_member">
                            </div>
                            {{-- <div class="section-title mt-0">Member</div> --}}
                            {{-- <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="memberCheck"
                                onclick="(this.checked) ? document.getElementById('id_member').disabled = false : document.getElementById('id_member').disabled = true;">
                            <label class="custom-control-label" for="memberCheck">Aktifkan jika punya kartu
                                member</label>
                            <input type="text" class="form-control" id="id_member" name="id_member" disabled>
                        </div> --}}
                            <div class="form-group">
                                <label>Tanggal barang masuk</label>
                                <input type="date" class="form-control datepicker">
                            </div>
                            <div class="form-group">
                                <label>Biaya tambahan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input type="text" class="form-control currency">
                                </div>
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
                                <label>Phone Number (US Format)</label>
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
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('addon-script')
<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">

<script src="{{ asset('assets/modules/moment.min.js') }}"></script>

<script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }} "></script>
<script src="{{ asset('assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>

<script src="{{ asset('assets/modules/cleave-js/dist/cleave.min.js') }}"></script>
  <script src="{{ asset('assets/modules/cleave-js/dist/addons/cleave-phone.us.js') }}"></script>

{{-- <script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script> --}}
{{-- <link rel="stylesheet" href="../node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<script>
    $(function () {
        $('.datepicker').datepicker();
    });

</script> --}}
<script>
    var cleaveC = new Cleave('.currency', {
  numeral: true,
  numeralThousandsGroupStyle: 'thousand'
});
var cleavePN = new Cleave('.phone-number', {
  phone: true,
  phoneRegionCode: 'us'
});
</script>
@endpush
