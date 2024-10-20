<?php

namespace Database\Seeders;

use App\Models\Baronas;
use App\Models\BaronasTeam;
use Illuminate\Database\Seeder;

class BaronasTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BaronasTeam::create([
            'kategori' => 'SD',
            'kelompok' => 'Kelompok 1'
        ]);
        BaronasTeam::create([
            'kategori' => 'SD',
            'kelompok' => 'Kelompok 2'
        ]);
        BaronasTeam::create([
            'kategori' => 'SMP',
            'kelompok' => 'Kelompok 1'
        ]);
        BaronasTeam::create([
            'kategori' => 'SMP',
            'kelompok' => 'Kelompok 2'
        ]);
        BaronasTeam::create([
            'kategori' => 'SMA',
            'kelompok' => 'Kelompok 1'
        ]);
        BaronasTeam::create([
            'kategori' => 'SMA',
            'kelompok' => 'Kelompok 2'
        ]);
    }
}
