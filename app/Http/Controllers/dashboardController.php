<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donatur;
use App\Kegiatan;
use App\Perolehan;

class dashboardController extends Controller
{
    public function index()
    {
        $donaturs = Donatur::count();
        $kegiatans = Kegiatan::count();
        $perolehans = Perolehan::sum('total_donasi');
        return view('layouts.dashboard',array('donaturs' => $donaturs, 'kegiatans' => $kegiatans, 'perolehans' => $perolehans));
    }
}
