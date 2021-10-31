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
                    <div class="card-body table-responsive-sm">
                        <table id="produk-table" class="table table-bordered" width="100%" collspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Paket</th>
                                    <th>Jenis</th>
                                    <th>Harga</th>
                                    <th>Toko</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                    @foreach($produks as $pr)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $pr->nama_paket}} </td>
                            <td>{{ $pr->jenis}} </td>
                            <td>{{ $pr->harga}} </td>
                            <td>{{ $pr->toko['nama']}} </td>
                            </tr>
                            @endforeach
                            </tbody> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('addon-script')
<script>
    $(function () {

        $('#produk-table').DataTable({
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
                    data: 'jenis',
                    name: 'jenis'
                },
                {
                    data: 'harga',
                    name: 'harga'
                },
                {
                    data: 'id_outlet',
                    name: 'id_outlet'
                },
                {
                    data: 'action',
                    name: 'action',
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
                                $('#produk-table').DataTable().ajax.reload();
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
