@extends('layouts.master')
@section('title', 'Manajemen Produk')

@section('header_title', 'Manajemen Produk')

@section('content')
<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Manajemen Produk</h1>
        </div>

        <a href="{{route('manajemen_produk.create')}}" class="btn btn-icon icon-left btn-primary mb-4"><i
                class="fas fa-plus"></i>Tambah produk baru</a>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true">Kiloan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Satuan</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="table-responsive-sm">
                                    <table id="produk-table-kiloan" class="table table-bordered" width="100%"
                                        collspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Paket</th>
                                                <th>Harga / Kilo</th>
                                                <th>Jenis</th>
                                                <th>Toko</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>

                            {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive-sm">
                                    <table id="produk-table-satuan" class="table table-bordered" width="100%"
                                        collspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Paket</th>
                                                <th>Harga / Satuan</th>
                                                <th>Toko</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('addon-script')
<script src="{{ asset("assets/modules/bootstrap/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("assets/js/stisla.js") }}"></script>

<script src="{{ asset("assets/js/scripts.js") }}"></script>
<script>
    $(function () {

        $('#produk-table-kiloan').DataTable({
            pageLength: 5,
            processing: true,
            serverSide: true,

            ajax: 'manajemen_produk/json',
            columns: [{
                    "data": "id",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1 + ".";
                    }
                },
                {
                    data: 'nama_paket',
                    name: 'nama_paket'
                },
                {
                    data: 'harga',
                    name: 'harga'
                },
                {
                    data: 'jenis',
                    name: 'jenis',
                    visible: false
                },
                {
                    data: 'toko.nama',
                    name: 'toko.nama'
                },
                {
                    data: 'action',
                    name: 'action',
                    align: 'center',
                    orderable: false,
                    searchable: false
                },
            ],
        });
    });

    $(function () {

        $('#produk-table-satuan').DataTable({
            pageLength: 5,
            processing: true,
            serverSide: true,

            ajax: 'manajemen_produk/get',
            columns: [{
                    "data": "id",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1 + ".";
                    }
                },
                {
                    data: 'nama_paket',
                    name: 'nama_paket'
                },
                {
                    data: 'harga',
                    name: 'harga'
                },
                {
                    data: 'toko.nama',
                    name: 'toko.nama'
                },
                {
                    data: 'action',
                    name: 'action',
                    align: 'center',
                    orderable: false,
                    searchable: false
                },
            ],
        });
    });
    $(document).ready(function () {


        var id;

        $(document).on('click', '.delete', function () {
            id = $(this).attr('id');
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data toko ini akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "manajemen_produk/destroy/" + id,
                        beforeSend: function () {
                            $('#ok_button').text('Deleting...');
                        },
                        success: function (data) {
                            setTimeout(function () {
                                $('#confirmModal').modal('hide');
                                $('#produk-table').DataTable().ajax
                                    .reload();
                            }, 2000);
                        }
                    })
                    Swal.fire({
                        title: 'Berhasil',
                        text: "Data toko berhasil dihapus.",
                        icon: 'success',
                        showCancelButton: false,
                        showCloseButton: false,
                        showConfirmButton: false,
                        timer: 2000,
                    })
                }
            })
        });

        $('#ok_button').click(function () {

        });
    });

</script>
@endpush
