<?php

use Illuminate\Database\Seeder;
use App\JenisSurat;
class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisSurat::create(['name' => 'Surat Resmi']);
        JenisSurat::create(['name' => 'Surat Setengah Resmi']);
        JenisSurat::create(['name' => 'Surat Pribadi']);
    }
}
