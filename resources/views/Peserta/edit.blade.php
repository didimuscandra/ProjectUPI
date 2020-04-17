@extends('layouts.home')

@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Peserta</h4> 
    </div>
</div>

<div class="row">
  <div class="col-sm-12">  
    <div class="white-box">
      <center><h3 class="box-title">Edit Peserta</h3></center></br>   
      <form action="/peserta/edit/{{$Peserta->id}}" method="post" class="form-horizontal form-material">
      {{ csrf_field() }}
        <div class="form-group">
          <label for="namaPeserta" class="col-md-12">Nama Peserta</label>
          <div class="col-md-12">
            <input type="text" class="form-control" id="namaPeserta" placeholder="Masukkan Nama Peserta" name="namaPeserta" class="form-control form-control-line" value="{{$Peserta->namaPeserta}}">  
          </div>
          <label for="tempatLahir" class="col-md-12">Tempat Lahir</label>
          <div class="col-md-12">
            <input type="text" class="form-control" id="tempatLahir" placeholder="Masukkan Tempat Lahir Peserta" name="tempatLahir" class="form-control form-control-line" value="{{$Peserta->tempatLahir}}"> 
          </div>
          <label for="tglLahir" class="col-md-12">Tanggal Lahir</label>
          <div class="col-md-12">
            <input type="date" class="form-control" id="tglLahir" placeholder="Masukkan Tanggal Lahir Peserta" name="tglLahir" class="form-control form-control-line" value="{{$Peserta->tglLahir}}"> 
          </div>
          <label for="gender" class="col-md-12">Gender</label>
          <div class="col-md-12">
            <input type="text" class="form-control" id="gender" placeholder="Masukkan Gender Peserta" name="gender" class="form-control form-control-line" value="{{$Peserta->gender}}"> 
          </div>
          <label for="alamat" class="col-md-12">Alamat</label>
          <div class="col-md-12">
            <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat Peserta" name="alamat" class="form-control form-control-line" value="{{$Peserta->alamat}}"> 
          </div>
          <label for="pekerjaan" class="col-md-12">Pekerjaan</label>
          <div class="col-md-12">
            <input type="text" class="form-control" id="pekerjaan" placeholder="Masukkan Pekerjaan Peserta" name="pekerjaan" class="form-control form-control-line" value="{{$Peserta->pekerjaan}}"> 
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success">Edit</button>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection()

        