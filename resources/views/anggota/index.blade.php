@extends('layouts.admin.master')
@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Anggota </button>
                </p>
            </div>
            <div class="box-body">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Anggota</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>No Hp</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $e=>$dt)
                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td>{{$dt->kode_anggota}}</td>
                                    <td>{{$dt->nama}}</td>
                                    <td>{{$dt->jenis_anggota}}</td>
                                    <td>{{$dt->tempat_lahir}}</td>
                                    <td>{{$dt->tgl_lahir}}</td>
                                    <td>{{$dt->no_hp}}</td>
                                    <td>{{$dt->alamat}}</td>
                                    <td>
                                        <a href="{{url('/anggota/edit/'.$dt->id)}}" class="btn btn-success btn-sm btn-flat">Edit</a>
                                        <a href="{{url('/anggota/delete/'.$dt->id)}}" class="btn btn-danger btn-sm btn-flat" onclick="return confirm ('Apakah Akan Anda Hapus?')">Hapus</a>
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
<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('anggota/create') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group {{$errors->has('kode_anggota') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">Kode Anggota</label>
                                <input name="kode_anggota" type="text" class="form-control" id="inputkode_anggota" placeholder="Input kode_anggota" readonly value="{{$kode}}">
                                @if($errors->has('kode_anggota'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('kode_anggota')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('nama') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">Nama</label>
                                <input name="nama" type="text" class="form-control" id="inputnama" placeholder="Input nama" value="{{old('nama')}}">
                                @if($errors->has('nama'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('nama')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('jenis_anggota') ? 'has-error' :''}}">
                                <label for="exampleFormControlSelect1">Pilih Jenis Anggota</label>
                                <select name="jenis_anggota" class="form-control" id="exampleFormControlSelect1">
                                    <option value="">-Pilih-</option>
                                    <option value="siswa" {{(old('jenis_anggota') == 'siswa')? 'selected':''}}>Siswa</option>
                                    <option value="guru" {{(old('jenis_anggota') == '1PS')? 'selected':''}}>Guru</option>
                                    <option value="staf" {{(old('jenis_anggota') == '1PS')? 'selected':''}}>Staf</option>
                                </select>
                                @if($errors->has('jurusan'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('jurusan')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('tempat_lahir') ? 'has-error' :''}}">
                                <label for="exampleFormControlTextarea1">Tempat Lahir</label>
                                <textarea name="tempat_lahir" class="form-control" id="exampleFormControlTextarea1" rows="4">{{old('tempat_lahir')}}</textarea>
                                @if($errors->has('tempat_lahir'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('tempat_lahir')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group {{$errors->has('tgl_lahir') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">Tanggal Lahir</label>
                                <input name="tgl_lahir" type="date" class="form-control" id="inputtgl_lahir" placeholder="Input tgl_lahir" value="{{old('tgl_lahir')}}">
                                @if($errors->has('tgl_lahir'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('tgl_lahir')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('jk') ? 'has-error' :''}}">
                                <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                                <select name="jk" class="form-control" id="exampleFormControlSelect1">
                                    <option value="">-Pilih-</option>
                                    <option value="L" {{(old('jk') == 'L')? 'selected':''}}>Laki-Laki</option>
                                    <option value="P" {{(old('jk') == 'P')? 'selected':''}}>Perempuan</option>
                                </select>
                                @if($errors->has('jk'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('jk')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('no_hp') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">No Hp</label>
                                <input name="no_hp" type="text" class="form-control" id="inputno_hp" placeholder="Input no_hp" value="{{old('no_hp')}}">
                                @if($errors->has('no_hp'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('no_hp')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('alamat') ? 'has-error' :''}}">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="4">{{old('alamat')}}</textarea>
                                @if($errors->has('alamat'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('alamat')}}</span>
                                @endif
                            </div>
                        </div>
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