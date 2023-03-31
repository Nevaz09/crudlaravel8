<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'nama'=>'Nevaz',
            'jenis_kelamin'=>'Pria',
            'no_telp'=>'081330657346',
        ]);
    }
}
