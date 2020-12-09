<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Imoveis;

class ImoveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Imoveis::factory()
        ->times(6)
        ->create();
    }
}
