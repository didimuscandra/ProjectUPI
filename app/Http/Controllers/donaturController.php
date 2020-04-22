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
        return view('Donatur.index',compact('donaturs'));
    }

    public function vcreate()
    {
        return view('JenisDonatur.create');
    }
    public function create(Request $req)
    {
        $donaturs = Donatur::orderBy('nama_donatur','asc')->get();
        $donaturs = new Donatur;
        $donaturs ->id_donatur = $req->input('id_donatur');
        $donaturs ->nama_donatur = $req->input('nama_donatur');
        $donaturs ->alamat = $req->input('alamat');
        $donaturs ->no_hp = $req->input('no_hp');
        $donaturs ->email = $req->input('email');
        $donaturs ->save();
        return redirect('/donatur');
        // return "aaaa";
    }

    public function vedit($id)
    {
        $donaturs = Donatur::Find($id);
        return view('Donatur.edit',['Donatur' => $donaturs]);
    }

    public function edit(Request $req, $id )
    {
        $donaturs = Donatur::orderBy('nama_donatur','asc')->get();
        $donaturs = new Donatur;
        $donaturs ->id_donatur = $req->input('id_donatur');
        $donaturs ->nama_donatur = $req->input('nama_donatur');
        $donaturs ->alamat = $req->input('alamat');
        $donaturs ->no_hp = $req->input('no_hp');
        $donaturs ->email = $req->input('email');
        $donaturs ->save();
        return redirect('/donatur');
        // return "aaaa";
    }
    public function delete($id)
    {
        $donaturs = Donatur::Find($id);
        $donaturs ->delete();
        return redirect()->back();
    }
}
