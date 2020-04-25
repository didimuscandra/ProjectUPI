<?php

namespace App\Http\Controllers;
use App\JenisDonatur;
use App\Donatur;

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
        $donaturs = Donatur::all();
        $jenisdonaturs = JenisDonatur::all();
        return view('Donatur.index',array('donaturs' =>$donaturs, 'jenisdonaturs' =>$jenisdonaturs));
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
}
