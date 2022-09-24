<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'id_setting' => 1,
            'nama_perusahaan' => 'TOSERBA',
            'alamat' => 'Jl. Candi Kalasan Malang',
            'telepon' => '081234777789',
            'tipe_nota' => 1, // kecil
            'diskon' => 3,
            'path_logo' => url('/img/logo.png'),
            'path_kartu_member' => url('/img/member.png'),
        ]);
    }
}
