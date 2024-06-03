<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table ="role";
    protected $primaryKey="kode_level";
    protected $fillable=['kode_level', 'nama_level'];
    use HasFactory;

    public function akun()
    {
        return $this->hasMany(akun::class, 'kode_level', 'level_akun');
    }
}
