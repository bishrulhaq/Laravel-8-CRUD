<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stock::create([
            'product_name' => 'Twinty Pencil',
            'product_desc' => 'HB 5 Drawing Pencil',
            'product_qty' => 100,
        ]);
    }
}
