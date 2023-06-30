<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\{Login, Barang};

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // SEEDER BARANG
        // \App\Models\Barang::factory(100)->create();
        // ========================================================

        // ========================================================
        $array_barang_sd = [
            'Baju Putih',
            'Rok Merah',
            'Celana Merah',
            'Baju Pramuka',
            'Celana Pramuka',
            'Rok Pramuka',
        ];
        $array_barang_smp = [
            'Baju Putih',
            'Rok Biru',
            'Celana Biru',
            'Baju Pramuka',
            'Rok Pramuka',
            'Celana Pramuka'
        ];
        $array_barang_sma = [
            'Baju Putih',
            'Rok Abu',
            'Celana Abu',
            'Baju Pramuka',
            'Rok Pramuka',
            'Rok Hitam',
            'Celana Pramuka'
        ];
        $array_ukuran = ['S', 'M', 'L', 'XL', 'XXL'];

        foreach ($array_barang_sd as $item1) {
            foreach ($array_ukuran as $item2) {
                $produk = new Barang;
                $random_kode = "BRG" . Str::random(5);
                $kode_produk = strtoupper($random_kode);
                $produk->create([
                    'barang_kode' => $kode_produk,
                    'barang_nama' => $item1,
                    'barang_kategori' => "SD",
                    'barang_ukuran' => $item2,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        foreach ($array_barang_smp as $item1) {
            foreach ($array_ukuran as $item2) {
                $produk = new Barang;
                $random_kode = "BRG" . Str::random(5);
                $kode_produk = strtoupper($random_kode);
                $produk->create([
                    'barang_kode' => $kode_produk,
                    'barang_nama' => $item1,
                    'barang_kategori' => "SMP",
                    'barang_ukuran' => $item2,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        foreach ($array_barang_sma as $item1) {
            foreach ($array_ukuran as $item2) {
                $produk = new Barang;
                $random_kode = "BRG" . Str::random(5);
                $kode_produk = strtoupper($random_kode);
                $produk->create([
                    'barang_kode' => $kode_produk,
                    'barang_nama' => $item1,
                    'barang_kategori' => "SMA",
                    'barang_ukuran' => $item2,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        // ========================================================

        // ADMIN
        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('admin', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Administrator',
            'login_username' => 'admin',
            'login_password' => $hashPassword,
            'login_email' => 'administrator@pmb-unidayan.com',
            'login_telepon' => '085944923123',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ADMIN
        $token = Str::random(16);
        $role = "admin";
        $hashPassword2 = Hash::make('jancok', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Fathur Walkers',
            'login_username' => 'fathurwalkers',
            'login_password' => $hashPassword2,
            'login_email' => 'fathurwalkers@laravel.com',
            'login_telepon' => '084842848242',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // ---------------------------------------------------------------------------
        // ---------------------------------------------------------------------------

        // ADMIN
        $token = Str::random(16);
        $role = "admin";
        $hashPassword = Hash::make('jancok', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Syarah',
            'login_username' => 'syarah',
            'login_password' => $hashPassword,
            'login_email' => 'syaral@flask.com',
            'login_telepon' => '08554929239',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // ---------------------------------------------------------------------------
        // ---------------------------------------------------------------------------

        // User Pertama
        $token = Str::random(16);
        $role = "user";
        $hashPassword = Hash::make('12345', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'Example Users',
            'login_username' => 'example',
            'login_password' => $hashPassword,
            'login_email' => 'user1@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // ---------------------------------------------------------------------------

        // User Kedua
        $token = Str::random(16);
        $role = "user";
        $hashPassword = Hash::make('user1234', [
            'rounds' => 12,
        ]);
        $hashToken = Hash::make($token, [
            'rounds' => 12,
        ]);
        Login::create([
            'login_nama' => 'User 2',
            'login_username' => 'user2',
            'login_password' => $hashPassword,
            'login_email' => 'user2@gmail.com',
            'login_telepon' => '085342072185',
            'login_token' => $hashToken,
            'login_level' => $role,
            'login_status' => "verified",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // GENERATE BANYAK USERS
        $faker = Faker::create('id_ID');
        for ($i=1; $i < 50; $i++) {
            $token = Str::random(16);
            $role = "user";
            $hashPassword = Hash::make('user1234', [
                'rounds' => 12,
            ]);
            $hashToken = Hash::make($token, [
                'rounds' => 12,
            ]);
            $username = $faker->username();
            $name = $faker->name();
            $email = $faker->email();
            $phoneNumber = $faker->phoneNumber();
            Login::create([
                'login_nama' => $name,
                'login_username' => $username,
                'login_password' => $hashPassword,
                'login_email' => $email,
                'login_telepon' => $phoneNumber,
                'login_token' => $hashToken,
                'login_level' => $role,
                'login_status' => "verified",
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
