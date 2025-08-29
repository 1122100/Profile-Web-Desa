<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Desa::create([
            'nama' => 'Desa Dukuh Agung',
            'visi' => 'Mewujudkan Desa Dukuh Agung yang maju, mandiri, dan sejahtera.',
            'misi' => 'Meningkatkan kualitas hidup masyarakat melalui pembangunan berkelanjutan dan pemberdayaan ekonomi lokal.',
            'luas_wilayah' => 500,
            'alamat' => 'Jl. Raya Dukuh Agung, Kecamatan Tikung, Kabupaten Lamongan',
            'email' => 'info@dukuhagung.example',
            'kode_pos' => '62280',
            'kecamatan' => 'Tikung',
            'kabupaten' => 'Lamongan',
            'provinsi' => 'Jawa Tengah',
            'kepala_desa' => 'Bapak Suparman',
        ]);
    }
}