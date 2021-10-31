@extends('layouts.master')
@section('title', 'Manajemen Outlet')
@section('header_title', 'Manajemen Outlet')

@section('content')

<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Manajemen Toko</h1>
        </div>

        <a href="{{route('manajemen_outlet.create')}}" class="btn btn-icon icon-left btn-primary mb-4"><i
                class="fas fa-plus"></i>Tambah cabang toko baru</a>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="toko-table" class="table table-bordered" width="100%" collspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                   @foreach($toko as $tk)
                                       <tr>
                                           <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $tk->nama}} </td>
                                <td>{{ $tk->alamat}} </td>
                                <td>{{ $tk->tlp}} </td>
                                </tr>
                                @endforeach
                                </tbody> --}}
                            </table>
                        </div>
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

        $('#toko-table').DataTable({
            pageLength: 5,
            processing: true,
            serverSide: true,

            ajax: 'manajemen_outlet/json',
            columns: [{
                    "data": "id",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1 + ".";
                    }
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'tlp',
                    name: 'tlp'
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
                        url: "manajemen_outlet/destroy/" + id,
                        beforeSend: function () {
                            $('#ok_button').text('Deleting...');
                        },
                        success: function (data) {
                            setTimeout(function () {
                                $('#confirmModal').modal('hide');
                                $('#toko-table').DataTable().ajax.reload();
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
