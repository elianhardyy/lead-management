<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create(['id_produk' => 1, 'nama_produk' => 'Cipta Residence 2']);
        Produk::create(['id_produk' => 2, 'nama_produk' => 'The Rich']);
        Produk::create(['id_produk' => 3, 'nama_produk' => 'Namorambe City']);
        Produk::create(['id_produk' => 4, 'nama_produk' => 'Grand Banten']);
        Produk::create(['id_produk' => 5, 'nama_produk' => 'Turi Mansion']);
        Produk::create(['id_produk' => 6, 'nama_produk' => 'Cipta Residence 1']);

    }
}
