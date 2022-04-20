@extends('mahasiswas.layout')
 
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Mahasiswa
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="{{ route('mahasiswa.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="nim">Nim</label>
                            <input type="nim" name="nim" class="form-control" id="Nim" aria-describedby="Nim" > 
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label> 
                            <input type="Nama" name="nama" class="form-control" id="Nama" aria-describedby="Nama" > 
                        </div>
                        <div class="form-group">
                            <label for="featured_image">Foto</label> 
                            <input type="file" name="featured_image" class="form-control" id="featured_image" aria-describedby="featured_image" > 
                            
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label> 
                            <select name="kelas" id="kelas"  class="form-control">
                                @foreach($kelas as $kls)
                                    <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label> 
                            <input type="Jurusan" name="jurusan" class="form-control" id="Jurusan" aria-describedby="Jurusan" > 
                        </div>
                        <div class="form-group">
                            <label for="no_handphone">No Handphone</label> 
                            <input type="No_Handphone" name="no_handphone" class="form-control" id="No_Handphone" aria-describedby="No_Handphone" > 
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label> 
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="email" > 
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label> 
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" aria-describedby="tanggal_lahir" > 
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
