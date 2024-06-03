<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey="kode_akun";
    protected $table = "akun";
    protected $fillable = ['kode_akun', 'nama_akun', 'deskripsi', 'tipe_akun', 'kategori_akun', 'level_akun', 'created_at'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'level_akun', 'kode_level');
    }
}
