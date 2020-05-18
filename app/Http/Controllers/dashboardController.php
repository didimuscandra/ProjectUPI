<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donatur;
use App\Kegiatan;

class dashboardController extends Controller
{
    public function index()
    {
        $donaturs = Donatur::count();
        $kegiatans = Kegiatan::count();
        return view('layouts.dashboard',array('donaturs' =>$donaturs, 'kegiatans' =>$kegiatans));
    }
}
