<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Kelas;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //melakukan pencarian
        if($request->has('cari')){
            $mahasiswas=Mahasiswa::where('nama','like','%'.$request->cari.'%')->paginate(5);
            return view('mahasiswas.index',  compact('mahasiswas')) 
                ->with('success', 'Mahasiswa Berhasil Ditampilkan');
        }
        else{
            //fungsi  eloquent  menampilkan  data  menggunakan  pagination
            // $mahasiswas = Mahasiswa::simplePaginate(5);  //Mengambil semua  isi  tabel
            $mahasiswas = Mahasiswa::with('kelas')->get();
            $mahasiswas= Mahasiswa::orderBy('nim', 'asc')->paginate(5);
            return view('mahasiswas.index',  compact('mahasiswas')) 
                ->with('i', (request()->input('page', 1)-1)* 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswas.create', ['kelas'=>$kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone'=>'required|min:10|numeric',
            'email'=>'required|email',
            'tanggal_lahir'=>'required',
        ]);
        //fungsi eloquent untuk menambah data
        $mahasiswas=new Mahasiswa;
        $mahasiswas->nim=$request->get('nim');
        $mahasiswas->nama=$request->get('nama');
        //$mahasiswas->kelas=$request->get('kelas');
        $mahasiswas->jurusan=$request->get('jurusan');
        $mahasiswas->no_handphone=$request->get('no_handphone');
        $mahasiswas->email=$request->get('email');
        $mahasiswas->tanggal_lahir=$request->get('tanggal_lahir');
        //$mahasiswas->save();

        $kelas=new Kelas;
        $kelas->id=$request->get('kelas');
        //$kelas->save();

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswas->kelas()->associate($kelas);
        $mahasiswas->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index') 
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        //code sebelum dibuat relasi --> $Mahasiswa = Mahasiswa::find($nim);
        $Mahasiswa = Mahasiswa::with('kelas')->where('nim',$nim)->first();
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        //$Mahasiswa = Mahasiswa::find($nim);
        //  $Mahasiswa = Mahasiswa::find($nim);
        $Mahasiswa = Mahasiswa::with('kelas')->where('nim',$nim)->first();
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone'=>'required|min:10|numeric',
            'email'=>'required|email',
            'tanggal_lahir'=>'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        //Mahasiswa::find($nim)->update($request->all());

        $Mahasiswa = Mahasiswa::with('kelas')->where('nim',$nim)->first();
        $Mahasiswa->nim = $request->get('nim');
        $Mahasiswa->nama = $request->get('nama');
        $Mahasiswa->jurusan = $request->get('jurusan');
        $Mahasiswa->no_handphone = $request->get('no_handphone');
        $Mahasiswa->email = $request->get('email');
        $Mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
        $Mahasiswa->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $Mahasiswa->kelas()->associate($kelas);
        $Mahasiswa->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($nim)->delete();
        return redirect()->route('mahasiswa.index')
            -> with('success', 'Mahasiswa Berhasil Dihapus');
    }
};
