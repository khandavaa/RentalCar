<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'alamat' => 'Jl. Dusun Gintungkolot, Gintungkerta, Kec. Klari, Karawang, Jawa Barat 41371',
            'phone' => '(0267) 8617717',
            'email' => '-',
            'footer_description' => 'THE TRACK',
            'tentang_perusahaan' => '',
            'sejarah_perusahaan' => '',
            'facebook' => 'https://www.facebook.com/',
            'instagram' => 'https://www.instagram.com/changshinindonesia_jj/',
            'linkedin' => 'https://www.linkedin.com/company/pt-changshin-indonesia/',
            'twitter' => 'https://www.twitter.com/',
        ]);
    }
}
