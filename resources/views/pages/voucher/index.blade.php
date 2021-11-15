@extends('layouts.master')
@section('title', 'Voucher')

@section('content')

<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Voucher</h1>
        </div>

        <a href="{{route('voucher.create')}}" class="btn btn-icon icon-left btn-primary mb-4"><i
            class="fas fa-plus"></i>Voucher Baru</a>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="voucher-table" class="table table-bordered" width="100%" collspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Voucher</th>
                                            <th>Nama Voucher</th>
                                            <th>Keterangan</th>
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
$(document).ready(function () {
        $('#voucher-table').DataTable({
            "searching": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true
        });
    });
</script>
@endpush
