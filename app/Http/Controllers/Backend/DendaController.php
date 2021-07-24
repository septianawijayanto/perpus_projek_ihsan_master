<?php

namespace App\Http\Controllers\Backend;

use App\Anggota;
use App\Buku;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DendaController extends Controller
{
    public function index()
    {
        $title = 'Data Denda';

        $anggota = Anggota::get();
        $buku = Buku::where('jml_buku', '>', 0)->get();

        $data = Transaksi::whereIn('status_ganti', ['belom', 'sudah'])->get();
        $title = 'Data Denda';
        return view('admin.denda.index', compact('title', 'data', 'anggota', 'buku'));
    }
    public function ganti($id)
    {
        $data = Transaksi::find($id);
        $buku_id = $data->buku_id;
        $buku = Buku::find($buku_id);
        $sekarang = $buku->jml_buku + 1;
        $diganti = $buku->diganti + 1;
        Buku::where('id', $buku_id)->update([
            'jml_buku' => $sekarang,
            'diganti' => $diganti
        ]);

        Transaksi::where('id', $id)->update(['status_ganti' => 'sudah']);
        return redirect()->back()->with('sukses', 'Buku Berhasil Di Ganti');
    }
    public function kwitansi($id)
    {
        $tgl = date('d F y');
        $data = Transaksi::find($id);
        $pdf = PDF::loadview('admin.denda.kwitansi', compact('data', 'tgl'))->setPaper('a5', 'landscape');
        return $pdf->stream('kwitansi' . date('Y-m-d_H:i:s') . '.pdf');
    }
}
