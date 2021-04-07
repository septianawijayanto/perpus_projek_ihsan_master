<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Anggota;
use App\User;
use Carbon\Carbon;
use Symfony\Contracts\Service\Attribute\Required;

class AnggotaController extends Controller
{
    public function index()
    {
        $getRow = Anggota::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();

        $lastId = $getRow->first();

        $kode = "AGT00001";

        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                $kode = "AGT0000" . '' . ($lastId->id + 1);
            } else if ($lastId->id < 99) {
                $kode = "AGT000" . '' . ($lastId->id + 1);
            } else if ($lastId->id < 999) {
                $kode = "AGT00" . '' . ($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                $kode = "AGT0" . '' . ($lastId->id + 1);
            } else {
                $kode = "AGT" . '' . ($lastId->id + 1);
            }
        }

        $data = Anggota::all();
        $title = 'Data Anggota';
        return view('anggota.index', compact('title', 'data', 'kode'));
    }
    public function create(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
        ];
        //dd($request->all());
        $this->validate($request, [
            // 'kode_anggota' => 'required',
            'nama' => 'required',
            'jenis_anggota' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ], $messages);


        $data = Anggota::create($request->all());

        return redirect('anggota')->with('sukses', 'Data Siswa Berhasil di Tambah');
    }
    public function delete($id)
    {
        try {
            $data = Anggota::find($id);
            $data->delete();
            return \redirect()->back()->with('sukses', 'Data Anggota Berhasil Dihapus');
        } catch (\throwable $th) {
            return \redirect()->back()->with('Gagal', 'Gagal Data Berelasi DiTabel Lain');
        }
    }
    public function edit($id)
    {
        $title = 'Edit Anggota';
        $user = User::get();

        $data = Anggota::find($id);
        return view('anggota.edit', compact('data', 'user', 'title'));
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
        ];
        //dd($request->all());
        $this->validate($request, [
            // 'kode_anggota' => 'required',
            'nama' => 'required',
            'jenis_anggota' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ], $messages);


        $data['nama'] = $request->nama;
        $data['jenis_anggota'] = $request->jenis_anggota;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tgl_lahir'] = $request->tgl_lahir;
        $data['jk'] = $request->jk;
        $data['alamat'] = $request->alamat;
        $data['no_hp'] = $request->no_hp;
        // /'created_at' => date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString())),
        $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));

        Anggota::where('id', $id)->update($data);
        return redirect('anggota')->with('sukses', 'Anggota Berhasil Diedit');
    }
}
