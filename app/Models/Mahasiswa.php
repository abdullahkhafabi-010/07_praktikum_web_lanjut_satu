<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table="mahasiswas"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas
 public $timestamps= false;
 protected $primaryKey = 'Nim'; // Memanggil isi DB Dengan primarykey
 /**
 * The attributes that are mass assignable.
 *
 * @var array
 */
 protected $fillable = [
 'Nim',
 'Nama',
 'Tanggal_Lahir',
 'Kelas',
 'Jurusan',
 'No_Handphone',
 'Email',
 ];

 public function kelas()
 {
    return $this->belongsTo(kelas::class);
 }

 public function matakuliah()
 {
      return $this->belongsToMany(MataKuliah::class);
 }
}
