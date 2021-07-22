@extends('layouts.admin.master')
@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
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
                                    <th>Aksi</th>

                                </tr>
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

                                        @if($dt->status=='pinjam')
                                        <a href="{{url('admin/pengembalian/kembali/'.$dt->id)}}" class="btn btn-success btn-xs ">Kembali</a>
                                        <a href="{{url('admin/pengembalian/rusak/'.$dt->id)}}" class="btn btn-danger btn-xs ">Rusak</a>
                                        <a href="{{url('admin/pengembalian/hilang/'.$dt->id)}}" class="btn btn-warning btn-xs">Hilang</a>

                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

<script type=" text/javascript">
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