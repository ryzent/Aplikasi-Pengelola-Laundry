@extends('layouts.master')
@section('title', 'Manajemen Produk')

@section('content')

<div class="main-content">
    <section class="section" style="margin-top: 0px">
        <div class="section-header">
            <h1>Tambah produk baru</h1>
        </div>

        <a href="{{ route('manajemen_produk.index')}}" class="btn btn-icon icon-left btn-primary mb-4"><i
            class="fas fa-arrow-left"></i>Kembali</a>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ route('manajemen_produk.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_paket">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control select2" name="jenis">
                                    <option value="Kiloan">Kiloan</option>
                                    <option value="Satuan">Satuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input type="text" class="form-control currency" name="harga">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Cabang Toko</label>
                                <select class="form-control select2" name="id_outlet">
                                    @foreach ($toko as $tk)
                                    <option value="{{$tk->id}}">{{$tk->nama}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('addon-script')
    <script>
    // var cleaveC = new Cleave('.currency', {
    //     numeral: true,
    //     numeralThousandsGroupStyle: 'thousand'
    // });
    </script>
@endpush
