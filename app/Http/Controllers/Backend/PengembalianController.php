<?php

namespace App\Http\Controllers\Backend;

use App\Anggota;
use App\Buku;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    public function index()
    {
        $anggota = Anggota::get();
        $buku = Buku::where('jml_buku', '>', 0)->get();

        $data = Transaksi::orderBy('id', 'DESC')->get();

        $title = 'Pengembalian';
        return view('admin.pengembalian.index', compact('title', 'data', 'anggota', 'buku'));
    }
    public function kembalikan($id)
    {
        $data = Transaksi::find($id);


        $data->buku->where('id', $data->buku_id)
            ->update([
                'jml_buku' => ($data->buku->jml_buku + 1),
                'jml_dipinjam' => $data->buku->jml_dipinjam - 1,
            ]);
        Transaksi::where('id', $id)->update([
            'status' => 'kembali',
            'updated_at' => date('Y-m-d', strtotime(Carbon::today()->toDateString())),
        ],);
        return redirect()->back()->with('sukses', 'Buku Dikembalikan');
        // $data = Transaksi::find($id);
        // $tgl_kembali = $data->tgl_kembali;
        // $tgl2 = today();

        // $selisih = $tgl2->diffInDays($tgl_kembali);



        // $data->buku->where('id', $data->buku_id)
        //     ->update([
        //         'jml_buku' => ($data->buku->jml_buku + 1),
        //         'jml_dipinjam' => $data->buku->jml_dipinjam - 1,
        //     ]);

        // $jns = $data->anggota->jenis_anggota;
        // if ($jns == 'siswa') {
        //     if ($tgl_kembali < $tgl2) {
        //         $denda = 1000 * $selisih;
        //         Transaksi::where('id', $id)->update([
        //             'status' => 'kembali',
        //             'denda' => $denda,
        //             'status_denda' => 'belum lunas',
        //             'updated_at' => date('Y-m-d', strtotime(Carbon::today()->toDateString())),
        //         ],);
        //     } else {
        //         $denda = 0;
        //         Transaksi::where('id', $id)->update([
        //             'status' => 'kembali',
        //             'denda' => $denda,

        //             'updated_at' => date('Y-m-d', strtotime(Carbon::today()->toDateString())),
        //         ],);
        //     }
        //     return redirect()->back()->with('sukses', 'Buku Dikembalikan');
        // } else {
        //     Transaksi::where('id', $id)->update([
        //         'status' => 'kembali',
        //         'denda' => 0,

        //         'updated_at' => date('Y-m-d', strtotime(Carbon::today()->toDateString())),
        //     ],);
        //     return redirect()->back()->with('sukses', 'Buku Dikembalikan');
        // }
    }
    public function rusak($id)
    {

        $dt = Transaksi::find($id);
        //Update Jumlah Buku
        $id_buku = $dt->buku_id;
        $buku = Buku::find($id_buku);
        $sekarang = $buku->rusak;
        $jml_rusak = $sekarang + 1;


        $dipinjam = $buku->jml_dipinjam;
        $jmldpskr = $dipinjam - 1;

        Buku::where('id', $id_buku)->update([
            'rusak' => $jml_rusak,
            'jml_dipinjam' => $jmldpskr,
        ]);
        Transaksi::where('id', $id)->update([
            'status' => 'rusak',
            'status_ganti' => 'belom',
            'keterangan' => 'rusak',
            'updated_at' => date('Y-m-d', strtotime(Carbon::today()->toDateString())),
        ],);

        return redirect()->back()->with('sukses', 'Status Peminjaman Rusak');
    }
    public function hilang($id)
    {

        $dt = Transaksi::find($id);
        //Update Jumlah Buku
        $id_buku = $dt->buku_id;
        $buku = Buku::find($id_buku);
        $sekarang = $buku->hilang;
        $jml_hilang = $sekarang + 1;


        $dipinjam = $buku->jml_dipinjam;
        $jmldpskr = $dipinjam - 1;

        Buku::where('id', $id_buku)->update([
            'hilang' => $jml_hilang,
            'jml_dipinjam' => $jmldpskr,
        ]);
        Transaksi::where('id', $id)->update([
            'status' => 'hilang',
            'status_ganti' => 'belom',
            'keterangan' => 'hilang',
            'updated_at' => date('Y-m-d', strtotime(Carbon::today()->toDateString())),
        ],);

        return redirect()->back()->with('sukses', 'Status Peminjaman Hilang');
    }
}
