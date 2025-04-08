<?php

namespace Database\Seeders;

use App\Models\Sales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sales::create(['id_sales' => 1, 'nama_sales' => 'Sales 1']);
        Sales::create(['id_sales' => 2, 'nama_sales' => 'Sales 2']);
        Sales::create(['id_sales' => 3, 'nama_sales' => 'Sales 3']);
    }
}
