<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\MataKuliah;

class Mahasiswa extends Model //Definisi Model
{
    use HasFactory;
    protected $table="mahasiswas"; //Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas
    public $timestamps= false; 
    protected $primaryKey = 'nim'; // Memanggil isi DB Dengan primarykey

    protected $fillable = [
        'nim',
        'nama',
        'featured_image',
        'kelas_id',
        'jurusan',
        'no_handphone',
        'email',
        'tanggal_lahir',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    
    public function matakuliah()
    {
        return $this->belongsToMany(MataKuliah::class, 'mahasiswa_matakuliah', 'mahasiswa_id', 'matakuliah_id')
            ->withPivot('nilai');
    }
}
