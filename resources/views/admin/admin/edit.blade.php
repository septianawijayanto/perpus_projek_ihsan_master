@extends('layouts.admin.master')
@section('konten')
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
                <div class="card-body">
                    <form action="{{ url('admin/admin/update/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group {{$errors->has('nama') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input name="nama" type="text" class="form-control" id="inputnisn" placeholder="Input Nama" value="{{$data->nama}}">
                            @if($errors->has('nama'))
                            <span class="right label label-danger" class=" help-block">{{$errors->first('nama')}}</span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('username') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Username</label>
                            <input name="username" type="text" class="form-control" id="inputnisn" placeholder="Input Username" value="{{$data->username}}">
                            @if($errors->has('username'))
                            <span class="right label label-danger" class=" help-block">{{$errors->first('username')}}</span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('password') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">password</label>
                            <input name="password" type="password" class="form-control" id="inputnoinduk" placeholder="Input password" value="{{$data->password}}">
                            @if($errors->has('password'))
                            <span class="right label label-danger" class=" help-block">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                        </div>
                    </form>
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