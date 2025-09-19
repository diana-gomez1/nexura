<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        // se llama a los seeders creados para las areas y los roles.
        $this->call([
            AreaSeeder::class,
            RolSeeder::class,
        ]);
        
        
}
}