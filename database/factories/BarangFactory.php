<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class BarangFactory extends Factory
{
    public function definition()
    {
        $array_word = ['Baju Putih', 'Baju Biru', 'Baju Abu', 'Baju Pramuka', 'Baju Batik', 'Hitam', 'Celana Putih', 'Celana Biru', 'Celana Pramuka', 'Celana Hitam', 'Celana Abu', 'Topi Biru', 'Topi Abu', 'Rok Putih', 'Rok Biru', 'Rok Hitam', 'Rok Pramuka'];
        $array_kategori = ['SD', 'SMP', 'SMA'];
        $array_ukuran = ['S', 'M', 'L', 'XL', 'XXL'];
        return [
            'barang_nama' => Arr::random($array_word),
            'barang_kategori' => Arr::random($array_kategori),
            'barang_ukuran' => Arr::random($array_ukuran)
        ];
    }
}
