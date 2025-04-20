<?php

namespace Database\Seeders;

use App\Models\Lapangan;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat satu user khusus untuk testing:
        User::factory()->create([
            'username'   => 'test_user',
            'email'      => 'test@example.com',
            'nama_user'  => 'Test User',
            'password'   => bcrypt('password'),  // password default
            'tanggal_lahir' => '1990-01-01',
            'gender'     => 'Laki laki',
            'kota'       => 'Jakarta',
            'role'       => 'user',
        ]);

        // Panggil semua seeder lain sesuai urutan dependensi:
        $this->call([
            UserSeeder::class,
            LapanganSeeder::class,
            KomunitasSeeder::class,
            AktivitasKomunitasSeeder::class,
            PostSeeder::class,
            KomentarPostinganSeeder::class,
            LikePostinganSeeder::class,
            RatingLapanganSeeder::class,
            SaranaFavoritSeeder::class,
            SportsGroupSeeder::class,
            MemberSportsgroupSeeder::class,
            RewardSeeder::class,
            TransaksiPoinSeeder::class,
            UserPoinSeeder::class,
            KomunitasSayaSeeder::class,
        ]);
    }
}

