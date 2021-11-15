@extends('layouts.master')
@section('title', 'Manajemen Pegawai')

@section('content')
<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Manajemen Pegawai</h1>
        </div>

        <a href="{{route('manajemen_pegawai.create')}}" class="btn btn-icon icon-left btn-primary mb-4"><i
                class="fas fa-plus"></i>Tambah pegawai baru</a>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive-sm">
                        <table id="pegawai-table" class="table table-bordered" width="100%" collspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Toko</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                    @foreach($pegawai as $pg)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $pg->name}} </td>
                            <td>{{ $pg->email}} </td>
                            <td>{{ $pg->toko['nama']}} </td>
                            <td>{{ $pg->role}} </td>
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

<!-- Modal -->
<div class="modal fade" id="pegawai_modal" tabindex="-1" aria-labelledby="pegawai_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pegawai_modalLabel">Info Pegawai</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" class="form-control" name="name" id="nama" readonly>
                    <div class="invalid-feedback">
                        Harap isi bagian nama
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" id="email" readonly>
                    <div class="invalid-feedback">
                        Harap isi bagian email
                    </div>
                </div>
                <div class="form-group">
                    <label>Golongan Pegawai</label>
                    <input type="text" class="form-control" name="role" id="role" readonly>
                </div>
                <div class="form-group">
                    <label>Cabang Toko</label>
                    <input type="text" class="form-control" name="outlet" id="outlet" readonly>
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
<script>

    $(document).ready(function () {

        $('body').on('click', '#detail_pegawai', function (event) {

            event.preventDefault();
            let hrefs = $(this).attr('data-attr');

            axios.get(hrefs)
            .then(function (response) {
                // handle success
                document.getElementById("edit").href = "manajemen_pegawai/ " + response.data.id + "/edit";

                $('#nama').val(response.data.name);
                $('#email').val(response.data.email);
                $('#role').val(response.data.role.nama_role);
                $('#outlet').val(response.data.toko.nama);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
        });

    });

    $(function () {

        $('#pegawai-table').DataTable({
            pageLength: 5,
            processing: true,
            serverSide: true,

            ajax: 'manajemen_pegawai/json',
            columns: [{
                    "data": "id",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1 + ".";
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'toko.nama',
                    name: 'toko.nama'
                },
                {
                    data: 'role.nama_role',
                    name: 'role.nama_role'
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
                text: "Data pegawai ini akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "manajemen_pegawai/destroy/" + id,
                        beforeSend: function () {
                            $('#ok_button').text('Deleting...');
                        },
                        success: function (data) {
                            setTimeout(function () {
                                $('#confirmModal').modal('hide');
                                $('#pegawai-table').DataTable().ajax.reload();
                            }, 2000);
                        }
                    })
                    Swal.fire({
                        title: 'Berhasil',
                        text: "Data pegawai berhasil dihapus.",
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
