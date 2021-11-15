@extends('layouts.master')
@section('title', 'Manajemen Pelanggan')

@section('content')
<div class="main-content" id="konten">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Manajemen Pelanggan</h1>
        </div>

        <a href="{{route('manajemen_pelanggan.create')}}" class="btn btn-icon icon-left btn-primary mb-4"><i
                class="fas fa-plus"></i>Tambah member baru</a>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="pelanggan-table" class="table table-bordered" width="100%" collspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="pelanggan_modal" tabindex="-1" aria-labelledby="pelanggan_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pelanggan_modalLabel">Info Pelanggan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama" readonly>
                    <div class="invalid-feedback">
                        Harap isi nama lengkap
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" readonly>
                    <div class="invalid-feedback">
                        Harap isi alamat
                    </div>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" readonly>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-phone"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control phone-number" name="tlp" id="tlp" readonly>
                        <div class="invalid-feedback">
                            Harap isi nomor telepon
                        </div>
                    </div>
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

        $('body').on('click', '#detail_pelanggan', function (event) {

            event.preventDefault();
            let hrefs = $(this).attr('data-attr');

            axios.get(hrefs)
            .then(function (response) {
                // handle success
                document.getElementById("edit").href = "manajemen_pelanggan/ " + response.data.id + "/edit";

                $('#nama').val(response.data.nama);
                $('#alamat').val(response.data.alamat);
                $('#jenis_kelamin').val(response.data.jenis_kelamin);
                $('#tlp').val(response.data.tlp);
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

        $('#pelanggan-table').DataTable({
            pageLength: 5,
            processing: true,
            serverSide: true,

            ajax: 'manajemen_pelanggan/json',
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
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin'
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
                text: "Data pelanggan ini akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/manajemen_pelanggan/destroy/" + id,
                        beforeSend: function () {
                            $('#ok_button').text('Deleting...');
                        },
                        success: function (data) {
                            setTimeout(function () {
                                $('#confirmModal').modal('hide');
                                $('#pelanggan-table').DataTable().ajax
                                    .reload();
                            }, 2000);
                        }
                    })
                    Swal.fire({
                        title: 'Berhasil',
                        text: "Data pelanggan berhasil dihapus.",
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
