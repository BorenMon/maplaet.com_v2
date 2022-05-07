<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $file = new Filesystem;
        $directories = ['admin-page-logo', 'brand-page-logo', 'artwork-image-preview'];
        foreach($directories as $directory) {
            $file->cleanDirectory("storage/app/public/$directory");
        }
        
        $this->call([
            UserSeeder::class,
        ]);
    }
}
