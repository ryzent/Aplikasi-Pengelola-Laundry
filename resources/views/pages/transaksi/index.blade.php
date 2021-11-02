@extends('layouts.master')
@section('title', 'Transaksi')

@section('content')

<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Transaksi</h1>
        </div>

        <a href="{{route('transaksi.create')}}" class="btn btn-icon icon-left btn-primary mb-4"><i
            class="fas fa-plus"></i>Transaksi Baru</a>


    </section>
</div>

@endsection

@push('addon-script')
<link rel="stylesheet" href="../node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<script>
    $(function () {
        $('.datepicker').datepicker();
    });

</script>
@endpush
