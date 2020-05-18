@extends('layouts.home')

@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Perolehan</h4> 
    </div>
</div>

<div class="row">
  <div class="col-sm-12">  
    <div class="white-box">
      <center><h3 class="box-title">Tambah Perolehan</h3></center></br>   
      <form action="/perolehan/create" method="post" class="form-horizontal form-material">
      {{ csrf_field() }}
        <div class="form-group">
          <label class="col-sm-12">Nama Donatur</label>
            <div class="col-sm-12">
              <select class="form-control form-control-line" name="jenis_donatur_id">
              <option value="" disabled {{ old('donatur') ? '' : 'selected' }}>Pilih Nama Donatur</option>
              @foreach($donaturs as $donatur)
                <option value="{{$donatur->id}}" {{ old('jenis') ? 'selected' : '' }} >{{$donatur->nama_donatur}}</option>
              @endforeach
              </select>
            </div>
        </div>
        <div class="form-group">
          <label class="col-sm-12">Nama Kegiatan</label>
            <div class="col-sm-12">
              <select class="form-control form-control-line" name="jenis_donatur_id">
              <option value="" disabled {{ old('kegiatan') ? '' : 'selected' }}>Pilih Nama Kegiatan</option>
              @foreach($kegiatans as $kegiatan)
                <option value="{{$kegiatan->id}}" {{ old('kegiatan') ? 'selected' : '' }} >{{$kegiatan->namaKegiatan}}</option>
              @endforeach
              </select>
            </div>
        </div>
        <div class="form-group">
          <label for="tgl_donasi" class="col-md-12">Tanggal Donasi</label>
          <div class="col-md-12">
            <input type="date" class="form-control" id="tgl_donasi" placeholder="Masukkan Tanggal Donasi" name="tgl_donasi" class="form-control form-control-line"> 
          </div>
        </div>
        <div class="form-group">
          <label for="donasi_cash" class="col-md-12">Donasi Cash</label>
          <div class="col-md-12">
            <input type="number" class="form-control" id="donasi_cash" placeholder="" name="donasi_cash" class="form-control form-control-line"> 
          </div>
        </div>
        <div class="form-group">
          <label for="donasi_barang" class="col-md-12">Donasi Barang</label>
          <div class="col-md-12">
            <input type="number" class="form-control" id="donasi_barang" placeholder="" name="donasi_barang" class="form-control form-control-line"> 
          </div>
        </div>
        <div class="form-group">
          <label for="total_donasi" class="col-md-12">Total Donasi</label>
          <div class="col-md-12">
            <input type="number" class="form-control" id="total_donasi" placeholder="" name="total_donasi" class="form-control form-control-line"> 
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection()

        