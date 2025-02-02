<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'John Doe',
            'username'  => 'John',
            'email'     => 'guru@sch.id',
            'role'      => 'Guru',
            'status'    => 'Aktif',
            'password'  => bcrypt('Guru123')
        ]);
    }
}
