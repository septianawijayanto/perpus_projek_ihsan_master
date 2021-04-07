@extends('layouts.admin.master')
@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    @if(Auth::user()->role=='admin')
                    <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Buku </button>
                    {{-- <a href="{{url('buku/export')}}" class="btn btn-flat btn-success btn-sm">Export</a> --}}
                    {{-- <button  class="
        btn btn-info btn-sm btn-flat" data-toggle="modal" data-target="#exampleimport"><i class="fa fa-cloud"></i> Import </button> --}}
                    @endif
                </p>
            </div>
            <div class="box-body">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cover</th>
                                    <th>Kode</th>
                                    <th>ISBN</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Sumber</th>
                                    <th>Lokasi</th>
                                    <th>Jumlah Buku</th>
                                    @if(Auth::user()->role=='admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $e=>$dt)

                                <tr>
                                    <td>{{$e+1}}</td>
                                    <td><a href="{{$dt->getAvatar()}}"> <img height="70px" width=" 50px" class="" src="{{$dt->getAvatar()}}" alt="Photo"></td>
                                    <td>{{$dt->kode_buku}}</td>
                                    <td>{{$dt->isbn}}</td>
                                    <td>{{$dt->judul}}</td>
                                    <td>{{$dt->pengarang}}</td>
                                    <td>{{$dt->penerbit}}</td>
                                    <td>{{$dt->sumber}}</td>
                                    <td>{{$dt->lokasi}}</td>
                                    <td>{{$dt->jml_buku}}</td>
                                    @if(Auth::user()->role=='admin')
                                    <td>
                                        <a href="{{url('/buku/edit/'.$dt->id)}}" class="btn btn-success btn-sm btn-flat">Edit</a>
                                        <a href="{{url('/buku/delete/'.$dt->id)}}" class="btn btn-danger btn-sm btn-flat" onclick="return confirm ('Apakah Akan Anda Hapus?')">Hapus</a>

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
                <h5 class="modal-title">Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('buku/create') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('judul') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">judul</label>
                        <input name="judul" type="text" class="form-control" id="inputjudul" placeholder="Input judul" value="{{old('judul')}}">
                        @if($errors->has('judul'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('judul')}}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group {{$errors->has('kode_buku') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">kode_buku</label>
                                <input name="kode_buku" type="text" class="form-control" id="inputkode_buku" placeholder="Input kode_buku" value="{{old('kode_buku')}}">
                                @if($errors->has('kode_buku'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('kode_buku')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('isbn') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">isbn</label>
                                <input name="isbn" type="text" class="form-control" id="inputisbn" placeholder="Input isbn" value="{{old('isbn')}}">
                                @if($errors->has('isbn'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('isbn')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('penerbit') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">pengarang</label>
                                <input name="pengarang" type="text" class="form-control" id="inputpengarang" placeholder="Input pengarang" value="{{old('pengarang')}}">
                                @if($errors->has('pengarang'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('pengarang')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('penerbit') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">penerbit</label>
                                <input name="penerbit" type="text" class="form-control" id="inputpenerbit" placeholder="Input penerbit" value="{{old('penerbit')}}">
                                @if($errors->has('penerbit'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('penerbit')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('tahun_terbit') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">tahun_terbit</label>
                                <input name="tahun_terbit" type="text" class="form-control" id="inputtahun_terbit" placeholder="Input tahun_terbit" value="{{old('tahun_terbit')}}">
                                @if($errors->has('tahun_terbit'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('tahun_terbit')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group {{$errors->has('jml_buku') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">jml_buku</label>
                                <input name="jml_buku" type="text" class="form-control" id="inputjml_buku" placeholder="Input jml_buku" value="{{old('jml_buku')}}">
                                @if($errors->has('jml_buku'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('jml_buku')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('sumber') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">sumber</label>
                                <input name="sumber" type="text" class="form-control" id="inputsumber" placeholder="Input sumber" value="{{old('sumber')}}">
                                @if($errors->has('sumber'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('sumber')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('lokasi') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">lokasi</label>
                                <input name="lokasi" type="text" class="form-control" id="inputlokasi" placeholder="Input lokasi" value="{{old('lokasi')}}">
                                @if($errors->has('lokasi'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('lokasi')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('deskripsi') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">deskripsi</label>
                                <input name="deskripsi" type="text" class="form-control" id="inputdeskripsi" placeholder="Input deskripsi" value="{{old('deskripsi')}}">
                                @if($errors->has('deskripsi'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('deskripsi')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('cover') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">cover</label>
                                <input name="cover" type="file" class="form-control" id="inputcover" placeholder="Input covern" value="{{old('cover')}}">
                                @if($errors->has('cover'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('cover')}}</span>
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
<div class="modal" id="exampleimport" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('buku/import') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('file_name') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">file_name</label>
                        <input name="file_name" type="file" class="form-control" id="inputfile_name" placeholder="Input file_name" value="{{old('file_name')}}">
                        @if($errors->has('file_name'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('file_name')}}</span>
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