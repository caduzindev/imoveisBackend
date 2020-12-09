<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ImovelAddress;

class ImovelAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImovelAddress::factory()->times(6)->create();
    }
}
