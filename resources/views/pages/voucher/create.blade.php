@extends('layouts.master')
@section('title', 'Voucher')

@section('content')


<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Voucher</h1>
        </div>

        <a href="{{route('voucher.index')}}" class="btn btn-icon icon-left btn-primary mb-4"><i
            class="fas fa-arrow-left"></i>Kembali</a>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="{{ route('voucher.store')}}" method="POST" class="needs-validation"
                            novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Voucher</label>
                                    <input type="text" class="form-control" name="kode_voucher" value="{{$kode}}" autofocus readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Voucher</label>
                                    <input type="text" class="form-control" name="nama_voucher"  autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Potongan</label>
                                    <input type="text" class="form-control" name="potongan"  autofocus>

                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan"  autofocus>

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

</script>
@endpush
