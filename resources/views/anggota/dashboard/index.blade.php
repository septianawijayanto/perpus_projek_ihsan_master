@extends('layouts.anggota.master')
@section('konten')
<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-book"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Buku</span>
                <span class="info-box-number">{{$buku}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-pencil"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Transaksi Peminjaman</span>
                <span class="info-box-number">{{$transaksi}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-white "><i class="fa fa-check-square-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Transaksi Selesai</span>
                <span class="info-box-number">{{$selesai}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>

@endsection