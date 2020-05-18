<?php

namespace App\Http\Controllers;
use App\Kegiatan;
use App\Donatur;
use App\Perolehan;

use Illuminate\Http\Request;

class perolehanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perolehans = Perolehan::all();
        $donaturs = Donatur::all();
        $kegiatans = Kegiatan::all();
        return view('Perolehan.index',array('perolehans' =>$perolehans, 'donaturs' =>$donaturs, 'kegiatans' =>$kegiatans));
    }

    public function vcreate()
    {
        $donaturs = Donaturs::orderBy('nama_donatur','asc')->get();
        $kegiatans = Kegiatan::orderBy('namaKegiatan','asc')->get();
        return view('Perolehan.create')->with([
            'donaturs'  => $donaturs,
            'kegiatans' => $kegiatans
        ]);
    }
    public function create(Request $req)
    {  
        $perolehans = new Perolehan;
        $perolehans ->donatur_id = $req->input('donatur_id');
        $perolehans ->kegiatan_id = $req->input('kegiatan_id');
        $perolehans ->tgl_donasi = $req->input('tgl_donasi');
        $perolehans ->donasi_cash = $req->input('donasi_cash');
        $perolehans ->donasi_barang = $req->input('donasi_barang');
        $perolehans ->total_donasi = $req->input('total_donasi');
        $perolehans ->save();
        return redirect('/perolehan')->with('info','Perolehan Baru Telah Ditambahkan!');
        // return "aaaa";
    }

    public function vedit($id)
    {
        $perolehans = Perolehan::Find($id);
        $donaturs = Donaturs::orderBy('nama_donatur','asc')->get();
        $kegiatans = Kegiatan::orderBy('namaKegiatan','asc')->get();
        return view('Perolehan.create')->with([
            'perolehans'  => $perolehans,
            'donaturs'  => $donaturs,
            'kegiatans' => $kegiatans
        ]);
    }

    public function edit(Request $req, $id )
    {
        $perolehans = Perolehan::Find($id);
        $perolehans ->donatur_id = $req->input('donatur_id');
        $perolehans ->kegiatan_id = $req->input('kegiatan_id');
        $perolehans ->tgl_donasi = $req->input('tgl_donasi');
        $perolehans ->donasi_cash = $req->input('donasi_cash');
        $perolehans ->donasi_barang = $req->input('donasi_barang');
        $perolehans ->total_donasi = $req->input('total_donasi');
        $perolehans ->save();
        return redirect('/perolehan')->with('info','Perolehan Baru Telah Ditambahkan!');
        // return "aaaa";
    }
    public function delete($id)
    {
        $perolehans = Perolehan::Find($id);
        $perolehans ->delete();
        return redirect()->back();
    }
}
