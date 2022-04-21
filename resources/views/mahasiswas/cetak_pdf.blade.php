@extends('mahasiswas.layout')

@section('content')
<body>
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
    </style>
      <h4 align="center">JURUSAN TEKNOLOGI INFORMASI POLITEKNIK NEGERI MALANG </h4>
      <h3 align="center">KARTU HASIL STUDI (KHS)</h3>

    <br><br>
    <table class="table" style="border: none;">
            <tr><td><b>NAMA:</b>&nbsp;{{$Mahasiswa->nama}}</td></tr>
            <tr><td><b>NIM:</b>&nbsp;{{$Mahasiswa->nim}}</td></tr>
            <tr><td><b>KELAS:</b>&nbsp;{{$Mahasiswa->kelas->nama_kelas}}</td></tr>
    </table>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($Mahasiswa->matakuliah as $score)
                <tr>
                    <td>{{$score->nama_matkul}}</td>
                    <td>{{$score->sks}}</td>
                    <td>{{$score->semester}}</td>
                    <td>{{$score->pivot->nilai}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
@endsection 