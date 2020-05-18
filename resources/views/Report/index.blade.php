@extends('layouts.home')
@section('content')

<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Laporan Kegiatan</h4> 
    </div>
</div>

<a href="/reports/pdf" class="btn btn-info" target="_blank" role="button">Cetak PDF</a>
<br/><br/>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <center><h3 class="box-title">Daftar Kegiatan</h3></center>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Tempat</th>
                            <th>Rencana Donasi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($kegiatans as $kegiatan)
                        <tr>
                            <td>{{ $kegiatan->namaKegiatan }}</td>
                            <td>{{ $kegiatan->tgl_mulai }}</td>
                            <td>{{ $kegiatan->tgl_selesai }}</td>
                            <td>{{ $kegiatan->tempat }}</td>
                            <td>{{ $kegiatan->rencana_donasi }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>   
@endsection