<?php

namespace maskeynihal\ladder\Seeds;

use Illuminate\Database\Seeder;
use maskeynihal\ladder\Seeds\HierarchySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HierarchySeeder::class);
    }
}
