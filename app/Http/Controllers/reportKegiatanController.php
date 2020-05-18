<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use Auth;
use DB;
use PDF;

class reportKegiatanController extends Controller
{
    /**
     *  Only authenticated users can access this controller
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the Report view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatans = Kegiatan::All();
        return view('Report.index')->with('kegiatans',$kegiatans);
    }

    /**
     *  Generate PDF
     * 
     * @return \Illuminate\Http\Response
     */
    public function makeReport(Request $request){
        $kegiatans = Kegiatan::all();
 
    	$pdf = PDF::loadview('Report.pdf',['kegiatans'=>$kegiatans]);
    	return $pdf->download('laporan-kegiatan-pdf');
    }
}
