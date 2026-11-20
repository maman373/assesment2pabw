<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Fasilitas\Models\Fasilitas;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@campuscare.ac.id'],
            [
                'name' => 'Admin Sarana Kampus',
                'role' => UserRole::Admin,
                'email_verified_at' => now(),
                'password' => 'password',
            ],
        );

        User::query()->updateOrCreate(
            ['email' => 'mahasiswa@campuscare.ac.id'],
            [
                'name' => 'Dimas Nugraha',
                'role' => UserRole::Mahasiswa,
                'email_verified_at' => now(),
                'password' => 'password',
            ],
        );

        $daftarFasilitas = [
            [
                'nama_fasilitas' => 'Kursi Kuliah Lipat Ruang 0401',
                'gedung' => 'Gedung TULT',
                'deskripsi' => 'Kursi kuliah ergonomis dengan meja lipat terintegrasi untuk perkuliahan kelas reguler lantai 4.',
                'kapasitas_unit' => 60,
            ],
            [
                'nama_fasilitas' => 'Komputer Praktikum Lab Pemrograman A',
                'gedung' => 'Gedung Fakultas Ilmu Terapan',
                'deskripsi' => 'Workstation praktikum lengkap dengan monitor 24 inci, jaringan LAN gigabit, dan perangkat periferal.',
                'kapasitas_unit' => 42,
            ],
            [
                'nama_fasilitas' => 'Proyektor Laser Ruang Kuliah B203',
                'gedung' => 'Gedung Kuliah Umum',
                'deskripsi' => 'Proyektor gantung resolusi Full HD beserta layar motorized dan kabel HDMI dinding.',
                'kapasitas_unit' => 4,
            ],
            [
                'nama_fasilitas' => 'Unit AC Split Ruang Baca Utama',
                'gedung' => 'Gedung Perpustakaan Pusat',
                'deskripsi' => 'Pendingin ruangan 2 PK untuk area belajar tenang dan ruang koleksi referensi.',
                'kapasitas_unit' => 12,
            ],
            [
                'nama_fasilitas' => 'Meja Studio Gambar & Desain',
                'gedung' => 'Gedung Industri Kreatif',
                'deskripsi' => 'Meja kerja permukaan miring berlapis laminasi untuk praktikum perancangan dan ilustrasi.',
                'kapasitas_unit' => 35,
            ],
            [
                'nama_fasilitas' => 'Sistem Audio & Mikrofon Auditorium',
                'gedung' => 'Gedung Auditorium Utama',
                'deskripsi' => 'Perangkat tata suara panggung meliputi mixer digital, speaker aktif, dan mikrofon nirkabel.',
                'kapasitas_unit' => 8,
            ],
        ];

        foreach ($daftarFasilitas as $fasilitas) {
            Fasilitas::query()->updateOrCreate(
                [
                    'nama_fasilitas' => $fasilitas['nama_fasilitas'],
                    'gedung' => $fasilitas['gedung'],
                ],
                $fasilitas,
            );
        }
    }
}
