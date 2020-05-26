<?php

namespace App\Http\Controllers;
use App\Kegiatan;
use App\Donatur;
use App\Perolehan;
use DB;
use PDF;

use Illuminate\Http\Request;

class perolehanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     * 
     */

    public function __construct(Perolehan $perolehans)
    {
        $this->perolehan = $perolehans;
    }

    public function index()
    {
        $perolehans = DB::Table('perolehans')
                    ->join('donaturs','donaturs.id','=','perolehans.donatur_id')
                    ->join('kegiatans','kegiatans.id','=','perolehans.kegiatan_id')
                    ->get();
                    
        return view('Perolehan.index',[ 'perolehans' => $perolehans]);
    }

    public function store(Request $req)
    {
        $data = $req->all();
        $this->perolehan->create($data);
        // return $this->sendResponse([], 'Created Successfully');
        return redirect('/perolehan');
    }

    public function vcreate()
    {
        //return view('Perolehan.create');
        $donaturs = Donatur::orderBy('nama_donatur','asc')->get();
        $kegiatans = Kegiatan::orderBy('namaKegiatan','asc')->get();
            return view('Perolehan.create')->with([
                'donaturs'  => $donaturs,
                'kegiatans' => $kegiatans]);
    }


    public function vedit($id)
    {
        $perolehans = Perolehan::Find($id);
        $donaturs = Donatur::orderBy('nama_donatur','asc')->get();
        $kegiatans = Kegiatan::orderBy('namaKegiatan','asc')->get();
            return view('Perolehan.edit')->with([
                'perolehans' => $perolehans,
                'donaturs'  => $donaturs,
                'kegiatans' => $kegiatans]);
    }

    public function edit(Request $req, $id )
    {
        $perolehans = Perolehan::Find($id);
        $perolehans ->donatur_id = $req->input('donatur_id');
        $perolahans ->kegiatan_id = $req->input('kegiatan_id');
        $perolehans ->tgl_donasi = $req->input('tgl_donasi');
        $perolehans ->nama_donasi = $req->input('nama_donasi');
        $perolehans ->jml_donasi = $req->input('jml_donasi');
        $perolehans ->total_donasi = $req->input('total_donasi');
        $perolehans ->save();
        return redirect('/perolehan')->with('info','Perolehan Telah Diedit!');
    }
    public function delete($id)
    {
        $perolehans = Perolehan::Find($id);
        $perolehans ->delete();
        return redirect()->back();
    }

    public function makeReport(Request $request){
        $perolehans = DB::Table('perolehans')
                    ->join('donaturs','donaturs.id','=','perolehans.donatur_id')
                    ->join('kegiatans','kegiatans.id','=','perolehans.kegiatan_id')
                    ->get();
                    
    	$pdf = PDF::loadview('Perolehan.pdf',['perolehans'=>$perolehans]);
    	return $pdf->download('laporan-perolehan-pdf');
    }
}
