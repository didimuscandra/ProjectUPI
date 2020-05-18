@extends('layouts.home')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Perolehan</h4> 
    </div>
</div>

<a href="/perolehan/create" class="btn btn-info" role="button">Tambahkan Perolehan</a>
<br><br>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <center><h3 class="box-title">Daftar Donatur</h3></center>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Donatur</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal Donasi</th>
                            <th>Donasi Cash</th>
                            <th>Donasi Barang</th>
                            <th>Total Donasi</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($perolehans as $perolehan)
                        <tr>
                            @foreach($donaturs as $donatur)
                            <td>{{ $donatur->nama_donatur }}</td>
                            @endforeach
                            @foreach($kegiatans as $kegiatan)
                            <td>{{ $kegiatan->namaKegiatan }}</td>
                            @endforeach
                            <td>{{ $perolehans->tgl_donasi }}</td>
                            <td>{{ $perolehans->donasi_cash }}</td>
                            <td>{{ $perolehans->donasi_barang }}</td>
                            <td>{{ $perolehans->total_donasi }}</td>
                            <td><a href="perolehan/delete/{{$perolehan->id}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                            <td><a href="perolehan/edit/{{$perolehan->id}}"><button type="button" class="btn btn-warning">Edit</button></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>        
@endsection()

                        