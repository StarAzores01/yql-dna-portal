<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            AdminUserSeeder::class,
            TeamMemberSeeder::class,
            BlogPostSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}
