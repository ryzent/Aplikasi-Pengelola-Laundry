@extends('layouts.master')
@section('title', 'Manajemen Pegawai')

@section('content')
    <div class="main-content">
        <section class="section" style="margin-top: 0px">
            <div class="section-header">
                <h1>Manajemen Pegawai</h1>
            </div>

            <a href="{{url('/manajemen_pegawai/create')}}" class="btn btn-icon icon-left btn-primary mb-4"><i class="fas fa-plus"></i>Tambah pegawai baru</a>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body table-responsive-sm">
                            <table id="class-table" class="table table-bordered" width="100%" collspacing="0">
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
                                <tbody>
                                    @foreach($pegawai as $pg)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $pg->name}} </td>
                                            <td>{{ $pg->email}} </td>
                                            <td>{{ $pg->toko['nama']}} </td>
                                            <td>{{ $pg->role}} </td>
                                        </tr>
                                    @endforeach
                                 </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection

@push('addon-script')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endpush
