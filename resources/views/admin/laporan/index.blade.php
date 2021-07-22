@extends('layouts.admin.master')
@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{url('admin/laporan/pdf')}}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-print"></i> Laporan Semua Transaksi</a>

                    <a href="{{url('admin/laporan/peminjamanpdf?status=pinjam')}}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-print"></i> Laporan Sedang Di pinjam</a>

                    <button class="btn btn-primary btn-sm btn-flat btn-priodepdf" data-toggle="modal" data-target="#modal"><i class="fa fa-print"></i> Laporan Periode</button>

                    <a href="{{url('admin/laporan/peminjamanpdf?status=kembali')}}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-print"></i> Laporan Pengembalian</a>


                    <a href="{{url('admin/laporan/anggotapdf')}}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-print"></i> Laporan Anggota</a>

                    <a href="{{url('admin/laporan/bukupdf')}}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-print"></i> Laporan Buku</a>

                </p>
            </div>
            <div class="box-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Judul</th>
                                    <th>Peminjam</th>
                                    <th>Tgl Pinjam</th>
                                    <th>Tgl Kembali</th>
                                    <th>Status</th>
                                    <th>Status Ganti</th>
                            </thead>

                            <tbody>
                                @foreach ($data as $e=>$dt)

                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>{{$dt->kode_transaksi}}</td>
                                    <td>{{$dt->buku->judul}}</td>
                                    <td>{{$dt->anggota->nama}}</td>
                                    <td>{{$dt->tgl_pinjam}}</td>
                                    <td>{{$dt->tgl_kembali}}</td>
                                    <td>
                                        @if($dt->status=='proses')
                                        <span class="label label-info">Proses</span>
                                        @elseif($dt->status=='pinjam')
                                        <span class="label label-primary">Dipinjam</span>
                                        @elseif($dt->status=='kembali')
                                        <span class="label label-success">Kembali</span>
                                        @elseif($dt->status=='rusak')
                                        <span class="label label-danger">Rusak</span>
                                        @elseif($dt->status=='hilang')
                                        <span class="label label-warning">Hilang</span>
                                        @else
                                        <span class="label label-warning">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($dt->status_ganti=='sudah')
                                        <span class="label label-info">Sudah Diganti</span>
                                        @elseif($dt->status_ganti=='belom')
                                        <span class="label label-primary">Belum Diganti</span>
                                        @else

                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    Pilih Panggal
                                </div>
                                <div class="modal-body">

                                    <form role="form" action="{{ url('admin/laporan/periodepdf') }}" method="get">
                                        <div class="box-body">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Dari Tanggal</label>
                                                <input type="date" class="form-control datepicker" id="inputtgl" placeholder="Dari Tanggal" name="dari" autocomplete="off" value="{{ date('Y-m-d') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Sampai tanggal</label>
                                                <input type="date" class="form-control datepicker" name="sampai" id="inputtgl2" placeholder="Sampai Tanggal" autocomplete="off" value="{{ date('Y-m-d') }}">
                                            </div>

                                        </div>
                                        <!-- /.box-body -->

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa  fa-power-off"></i> Tutup</button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function() {

        // btn refresh
        $('.btn-refresh').click(function(e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })

    })
</script>

@endsection