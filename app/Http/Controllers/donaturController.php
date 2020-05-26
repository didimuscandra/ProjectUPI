<?php

namespace App\Http\Controllers;
use App\JenisDonatur;
use App\Donatur;
use PDF;
use DB;
use Illuminate\Http\Request;

class donaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donaturs = DB::Table('donaturs')
                    ->join('jenis_donaturs','jenis_donaturs.id','=','donaturs.jenis_donatur_id')->get();
        //$donaturs = Donatur::all();
        //$jenisdonaturs = JenisDonatur::all(); 
        //return view('Donatur.index',array('donaturs' =>$donaturs, 'jenisdonaturs' =>$jenisdonaturs));
        return view('Donatur.index',[ 'donaturs' => $donaturs]);
    }

    public function vcreate()
    {
        $jenisdonaturs = JenisDonatur::orderBy('jenisDonatur','asc')->get();
        return view('Donatur.create')->with([
            'jenisdonaturs'  => $jenisdonaturs
        ]);
    }
    
    public function create(Request $req)
    {
        
        $donaturs = new Donatur;
        $donaturs ->jenis_donatur_id = $req->input('jenis_donatur_id');
        $donaturs ->nama_donatur = $req->input('nama_donatur');
        $donaturs ->alamat = $req->input('alamat');
        $donaturs ->no_hp = $req->input('no_hp');
        $donaturs ->email = $req->input('email');
        $donaturs ->save();
        return redirect('/donatur')->with('info','Donatur Baru Telah Ditambahkan!');
        // return "aaaa";
    }

    public function vedit($id)
    {
        $donaturs = Donatur::Find($id);
        $jenisdonaturs = JenisDonatur::orderBy('jenisDonatur','asc')->get();
        return view('Donatur.edit')->with([
            'Donatur' => $donaturs,
            'jenisdonaturs'  => $jenisdonaturs
        ]);
    }

    public function edit(Request $req, $id )
    {
        $donaturs = Donatur::Find($id);
        $donaturs ->jenis_donatur_id = $req->input('jenis_donatur_id');
        $donaturs ->nama_donatur = $req->input('nama_donatur');
        $donaturs ->alamat = $req->input('alamat');
        $donaturs ->no_hp = $req->input('no_hp');
        $donaturs ->email = $req->input('email');
        $donaturs ->save();
        return redirect('/donatur')->with('info','Donatur Baru Telah Diedit!');
        // return "aaaa";
    }
    public function delete($id)
    {
        $donaturs = Donatur::Find($id);
        $donaturs ->delete();
        return redirect()->back();
    }

    public function makeReport(Request $request){
        $donaturs = DB::Table('donaturs')
                    ->join('jenis_donaturs','jenis_donaturs.id','=','donaturs.jenis_donatur_id')->get();
 
    	$pdf = PDF::loadview('Donatur.pdf',['donaturs' => $donaturs]);
    	return $pdf->download('laporan-donatur-pdf');
    }
}
