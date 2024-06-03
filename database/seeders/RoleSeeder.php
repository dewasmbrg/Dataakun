<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data role ke dalam database
        Role::create([
            'kode_level' => 1,
            'nama_level' => 'Akun Mikro',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Role::create([
            'kode_level' => 2,
            'nama_level' => 'Akun Standar',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Role::create([
            'kode_level' => 3,
            'nama_level' => 'Akun Mini',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
