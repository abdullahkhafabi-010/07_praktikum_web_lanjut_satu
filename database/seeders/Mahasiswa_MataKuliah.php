<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Mahasiswa_MataKuliah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'mahasiswa_id' => '2041720050',
                'matakuliah_id' => 1,
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '2041720050',
                'matakuliah_id' => 2,
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '2041720050',
                'matakuliah_id' => 3,
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '2041720050',
                'matakuliah_id' => 4,
                'nilai' => 'A'
            ],
            // [
            //     'mahasiswa_id' => '2141721351',
            //     'matakuliah_id' => 1,
            //     'nilai' => '90'
            // ],
            // [
            //     'mahasiswa_id' => '2241720151',
            //     'matakuliah_id' => 2,
            //     'nilai' => '90'
            // ],
            // [
            //     'mahasiswa_id' => '2241725151',
            //     'matakuliah_id' => 3,
            //     'nilai' => '90'
            // ],
            // [
            //     'mahasiswa_id' => '2041720220',
            //     'matakuliah_id' => 4,
            //     'nilai' => '90'
            // ],
        ];
        DB::table('mahasiswa_matakuliah')->insert($data);
    }
}
