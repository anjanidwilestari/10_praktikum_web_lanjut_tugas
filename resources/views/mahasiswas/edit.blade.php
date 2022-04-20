@extends('mahasiswas.layout')
 
@section('content')
 
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Mahasiswa
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
                    <form method="post" action="{{ route('mahasiswa.update', $Mahasiswa->nim) }}" id="myForm">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="nim">Nim</label> 
                            <input type="text" name="nim" class="form-control" id="Nim" value="{{ $Mahasiswa->nim }}" aria-describedby="Nim" > 
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label> 
                            <input type="text" name="nama" class="form-control" id="Nama" value="{{ $Mahasiswa->nama }}" aria-describedby="Nama" > 
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label> 
                            <input type="Kelas" name="kelas" class="form-control" id="Kelas" value="{{ $Mahasiswa->kelas }}" aria-describedby="Kelas" > 
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label> 
                            <input type="Jurusan" name="jurusan" class="form-control" id="Jurusan" value="{{ $Mahasiswa->jurusan }}" aria-describedby="Jurusan" > 
                        </div>
                        <div class="form-group">
                            <label for="no_handphone">No Handphone</label> 
                            <input type="No_Handphone" name="no_handphone" class="form-control" id="No_Handphone" value="{{ $Mahasiswa->no_handphone }}" aria-describedby="No_Handphone" > 
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label> 
                            <input type="email" name="email" class="form-control" id="email" value="{{ $Mahasiswa->email }}" aria-describedby="email" > 
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ $Mahasiswa->tanggal_lahir }}" aria-describedby="tanggal_lahir" > 
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 