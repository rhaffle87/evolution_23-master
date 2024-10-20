<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ElectraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('electras')->insert(
            [
                'no_pendaftaran' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'nama_tim' => Str::random(10),
                'nama_ketua' => Str::random(10),
                'kelas_ketua' => Str::random(10),
                'nama_anggota' => Str::random(10),
                'kelas_anggota' => Str::random(10),
                'sekolah' => Str::random(10),
                'alamat_sekolah' => Str::random(10),
                'nomor_hp_ketua' => Str::random(10),
                'nomor_hp_anggota' => Str::random(10),
                'region' => Str::random(10),
                'bukti_upload_twibbon_ketua' => Str::random(10),
                'bukti_upload_twibbon_anggota' => Str::random(10),
                'pembayaran_bank' => Str::random(10),
                'pembayaran_atas_nama' => Str::random(10),
                'pembayaran_status' => '0',
                'pembayaran_bukti' => Str::random(10),
                'file_ktp_ketua' => Str::random(10),
                'file_ktp_anggota' => Str::random(10),
                'status_lolos' => Str::random(10),
            ],
            [
                'no_pendaftaran' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'nama_tim' => Str::random(10),
                'nama_ketua' => Str::random(10),
                'kelas_ketua' => Str::random(10),
                'nama_anggota' => Str::random(10),
                'kelas_anggota' => Str::random(10),
                'sekolah' => Str::random(10),
                'alamat_sekolah' => Str::random(10),
                'nomor_hp_ketua' => Str::random(10),
                'nomor_hp_anggota' => Str::random(10),
                'region' => Str::random(10),
                'bukti_upload_twibbon_ketua' => Str::random(10),
                'bukti_upload_twibbon_anggota' => Str::random(10),
                'pembayaran_bank' => Str::random(10),
                'pembayaran_atas_nama' => Str::random(10),
                'pembayaran_status' => '0',
                'pembayaran_bukti' => Str::random(10),
                'file_ktp_ketua' => Str::random(10),
                'file_ktp_anggota' => Str::random(10),
                'status_lolos' => Str::random(10),
            ],
            [
                'no_pendaftaran' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'nama_tim' => Str::random(10),
                'nama_ketua' => Str::random(10),
                'kelas_ketua' => Str::random(10),
                'nama_anggota' => Str::random(10),
                'kelas_anggota' => Str::random(10),
                'sekolah' => Str::random(10),
                'alamat_sekolah' => Str::random(10),
                'nomor_hp_ketua' => Str::random(10),
                'nomor_hp_anggota' => Str::random(10),
                'region' => Str::random(10),
                'bukti_upload_twibbon_ketua' => Str::random(10),
                'bukti_upload_twibbon_anggota' => Str::random(10),
                'pembayaran_bank' => Str::random(10),
                'pembayaran_atas_nama' => Str::random(10),
                'pembayaran_status' => '0',
                'pembayaran_bukti' => Str::random(10),
                'file_ktp_ketua' => Str::random(10),
                'file_ktp_anggota' => Str::random(10),
                'status_lolos' => Str::random(10),
            ]
        );
    }
}
