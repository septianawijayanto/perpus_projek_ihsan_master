@extends('layouts.admin.master')
@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Peminjaman </button>
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
                                    <th>Denda</th>
                                    @if(Auth::user()->role=='admin')
                                    <th>Aksi</th>
                                    @endif
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
                                    <td>{{$dt->status}}</td>
                                    <td>Rp. {{number_format($dt->denda)}}</td>
                                    @if(Auth::user()->role=='admin')
                                    <td>
                                        @if($dt->status=='proses')
                                        <a href="{{url('/transaksi/setujui/'.$dt->id)}}" class="btn btn-primary btn-sm btn-flat">Setujui</a>
                                        <a href="{{url('/transaksi/tolak/'.$dt->id)}}" class="btn btn-danger btn-sm btn-flat">Tolak</a>
                                        @elseif($dt->status=='pinjam')
                                        <a href="{{url('/transaksi/perpanjang/'.$dt->id)}}" class="btn btn-success btn-sm btn-flat">Perpanjang</a>
                                        @endif
                                    </td>
                                    @endif
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

<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('transaksi/create') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('kode_transaksi') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">Kode Transaksi</label>
                        <input name="kode_transaksi" type="text" class="form-control" id="inputkode" required readonly placeholder="Input kode" value="{{$kode}}">
                        @if($errors->has('kode_transaksi'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('nisn')}}</span>
                        @endif
                    </div>
                    @if(Auth::user()->role=='admin')
                    <div class="form-group {{$errors->has('anggota_id') ? 'has-error' :''}}">
                        <label for="exampleFormControlSelect1">Nama</label>
                        <select name="anggota_id" class="form-control" id="exampleFormControlSelect1">
                            <option value="">-Pilih-</option>
                            @foreach ($anggota as $ang)
                            <option value="{{$ang->id}}">{{$ang->nama}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('anggota_id'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('anggota_id')}}</span>
                        @endif
                    </div>
                    @else
                    <div class="form-group {{$errors->has('anggota_id') ? 'has-error' :''}}">
                        <label for="exampleFormControlSelect1">Nama</label>
                        <select name="anggota_id" class="form-control" id="exampleFormControlSelect1">
                            @foreach ($anggota as $ang)
                            @if($ang->user_id==Auth::user()->id)
                            <option value="{{$ang->id}}">{{$ang->user->name}}</option>
                            @endif
                            @endforeach
                        </select>
                        @if($errors->has('anggota_id'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('anggota_id')}}</span>
                        @endif
                    </div>
                    @endif
                    <div class="form-group {{$errors->has('buku_id') ? 'has-error' :''}}">
                        <label for="exampleFormControlSelect1">Judul Buku</label>
                        <select name="buku_id" class="form-control" id="exampleFormControlSelect1">
                            <option value="">-Pilih-</option>
                            @foreach ($buku as $ang)
                            <option value="{{$ang->id}}">{{$ang->judul}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('buku_id'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('buku_id')}}</span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa  fa-power-off"></i> Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
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