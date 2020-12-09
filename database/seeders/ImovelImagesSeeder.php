<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ImovelImages;

class ImovelImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImovelImages::factory()->times(7)->create();
    }
}
