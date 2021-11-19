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
                    <form action="{{ route('riwayat-transaksi.update', $transaksi->id)}}" method="POST"
                        class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Toko</label>
                                <input type="text" class="form-control" name="toko" readonly
                                    value="{{ $transaksi->toko['nama'] }}">
                            </div>
                            <div class="form-group">
                                <label>Kode Invoice</label>
                                <input type="text" class="form-control" name="kode_invoice" readonly
                                    value="{{ $transaksi->kode_invoice }}">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="kode_member" readonly
                                    value="{{ $transaksi->nama }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal barang masuk</label>
                                <input type="text" class="form-control" readonly
                                    value="{{ date('Y-m-d', strtotime($transaksi->tgl_masuk)) }}">
                            </div>

                            <div class="table-responsive-sm">
                                <table id="produk-table-transaksi" class="table table-bordered" width="100%"
                                    collspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Barang</th>
                                            <th>Harga</th>
                                            <th>Banyak Barang</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detail as $td)

                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{$td->paket['nama_paket']}}</td>
                                            <td>{{$td->paket['harga']}}</td>
                                            <td>{{$td->banyak}}</td>
                                            <td>{{$td->total}}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                            <div class="form-group">
                                <label>Total Bayar</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input type="text" class="form-control currency" name="" value="{{$total}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="select-status form-control select2" name="status"
                                    data-id="{{ $transaksi->kode_invoice}}" data-val="{{ $transaksi->id_status }}">
                                    @foreach ($status as $ss)
                                    @if ($transaksi->id_status == $ss->id)
                                    <option selected value="{{$ss->id}}">{{$ss->status}}</option>
                                    @else
                                    <option value="{{$ss->id}}">{{$ss->status}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                            <a type="#" class="btn btn-primary" id="bayar_transaksi" data-bs-toggle="modal"
                                data-bs-target="#bayar_modal" >
                                Bayar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="bayar_modal" tabindex="-1" aria-labelledby="bayar_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/kasir/riwayat-transaksi/bayar-transaksi" method="POST" class="needs-validation"
                novalidate="" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="bayar_modalLabel">Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Kode Invoice</label>
                            <input type="text" class="form-control" name="kode_invoice" readonly
                                value="{{ $transaksi->kode_invoice }}">
                        </div>
                        <div class="form-group">
                            <label>Harga yang dibayar</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Rp
                                    </div>
                                </div>
                                <input type="text" class="form-control currency" id="total-harga" name="bayar_total"
                                    value="{{$total}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bayar</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Rp
                                    </div>
                                </div>
                                <input type="text" class="form-control currency" name="dibayar" id="input-bayar">
                            </div>
                        </div>
                        <h4>Kembalian : <span id="kembalian"></span></h4>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" id="btn-simpan" type="button" class="btn btn-primary">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('addon-script')
<link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">

<script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>

<script src="{{ asset('assets/modules/cleave-js/dist/cleave.min.js') }}"></script>

<script>
    $(document).on('change', '.select-status', function () {
        let kode_invoice = $(this).data('id');
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Mengubah status transaksi ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#6777ef',
            cancelButtonColor: '#fb160a',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                let val = $(this).val();
                axios.post('/kasir/riwayat-transaksi/update-status', {
                        kode_invoice: kode_invoice,
                        id_status: val
                    })
                    .then(function (response) {
                        iziToast.success({
                            title: 'Berhasil!',
                            message: 'Status berhasil diperbarui!',
                            position: 'topRight'
                        });
                        this.output = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            } else {
                $(this).val($(this).data('val'));
                return;
            }
        });
    });

    var cleaveC = new Cleave('.currency', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    let fixTotal = $('#total-harga').val();
    let total = $('#total-harga').val();

    $('#bayar_modal').on('shown.bs.modal', function () {
        $(this).find('#input-bayar').focus();
    });


    $('#input-bayar').on('keyup', function () {
        $('#kembalian').html($('#input-bayar').val() - total);
    });

</script>
@endpush
