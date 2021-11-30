@extends('layouts.master')
@section('title', 'Transaksi')

@section('content')

<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Riwayat Transaksi</h1>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="transaksi-table" class="table table-bordered" width="100%" collspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Invoice</th>
                                        <th>Nama</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transaksi as $tr)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $tr->kode_invoice}} </td>
                                        <td>{{ $tr->nama}} </td>
                                        <td>{{ date('Y-m-d', strtotime($tr->tgl_masuk))}} </td>
                                        <td class="">
                                            @if ($tr->id_status == 3)
                                            <div class="badge badge-success">Selesai</div>
                                            @else
                                            {{-- {{ $tr->status['status']}} --}}
                                            <select class="select-status form-control" name="status" id="select_status"
                                                data-id="{{ $tr->kode_invoice}}" data-val="{{ $tr->id_status }}">
                                                @foreach ($status as $ss)
                                                @if ($tr->id_status == $ss->id)
                                                <option selected value="{{$ss->id}}">{{$ss->status}}</option>
                                                @else
                                                <option value="{{$ss->id}}">{{$ss->status}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @endif
                                        </td>
                                        <td>
                                            <a id="detail_transaksi" data-bs-toggle="modal"
                                                data-bs-target="#transaksi_modal"
                                                data-attr="{{ route('riwayat-transaksi.show', $tr->kode_invoice) }}"
                                                class="m-1 edit btn btn-primary btn-sm"><i
                                                    class="far fa-eye text-white"></i></a>
                                            <a href="riwayat-transaksi/{{$tr->id}}/edit"
                                                class="m-1 edit btn btn-success btn-sm"><i
                                                    class="far fa-edit text-white"></i></a>
                                            <a href="riwayat-transaksi/delete/{{$tr->id}}"
                                                class="m-1 btn btn-danger btn-sm delete-confirm"><i
                                                    class="far fa-trash-alt text-white"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="transaksi_modal" tabindex="-1" aria-labelledby="transaksi_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaksi_modalLabel">Info Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group">
                        <label>Kode Invoice</label>
                        <input type="text" class="form-control" name="kode_invoice" id="kode_invoice" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="text" class="form-control" name="tgl_masuk" id="tgl_masuk" readonly>
                    </div>
                    <div class="form-group">
                        <label>Barang</label>
                        <input type="text" class="form-control" name="barang" id="barang" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" id="jumlah" readonly>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" name="status" id="status" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="m-1 edit btn btn-success" id="edit">Ubah</a>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('addon-script')
<link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">
<script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#transaksi-table').DataTable({
            "searching": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true

        });

        $('body').on('click', '#detail_transaksi', function (event) {

            event.preventDefault();
            let hrefs = $(this).attr('data-attr');

            axios.get(hrefs)
                .then(function (response) {
                    // handle success
                    document.getElementById("edit").href = "riwayat-transaksi/" + response.data[0][
                            0].id +
                        "/edit";
                    var tgl = moment(response.data[0][0].tgl_masuk).format("YYYY-MM-DD");
                    $('#kode_invoice').val(response.data[0][0].kode_invoice);
                    $('#nama').val(response.data[0][0].nama);
                    $('#tgl_masuk').val(tgl);
                    $('#barang').val(response.data[1][0].paket.nama_paket);
                    $('#jumlah').val(response.data[1][0].banyak);
                    $('#status').val(response.data[0][0].status.status);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
        });

        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data transaksi ini akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6777ef',
                cancelButtonColor: '#fb160a',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Tidak',
            }).then(function (value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });

    });

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
                axios.post('riwayat-transaksi/update-status', {
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

</script>
@endpush
