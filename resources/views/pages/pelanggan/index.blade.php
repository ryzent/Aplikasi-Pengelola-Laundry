@extends('layouts.master')
@section('title', 'Manajemen Pelanggan')
@section('header_title', 'Manajemen Pelanggan')

@section('content')
<div class="main-content" id="konten">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Manajemen Pelanggan</h1>
        </div>

        <a href="{{url('manajemen_pelanggan/create')}}" class="btn btn-icon icon-left btn-primary mb-4"><i
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

@endsection

@push('addon-script')

<script>
    $(function(){

        $('#pelanggan-table').DataTable({
            pageLength : 5,
            processing: true,
            serverSide: true,

            ajax: '/manajemen_pelanggan/json',
            columns: [
                {"data": "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1 +".";
                }
            },
                { data: 'nama', name: 'nama'},
                { data: 'alamat', name: 'alamat'},
                { data: 'jenis_kelamin', name: 'jenis_kelamin'},
                { data: 'tlp', name: 'tlp'}
            ],
        });
    });
</script>

@endpush
