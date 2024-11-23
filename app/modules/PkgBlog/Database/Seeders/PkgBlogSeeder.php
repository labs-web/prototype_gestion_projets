<?php

namespace Modules\PkgBlog\Database\Seeders;

use Illuminate\Database\Seeder;

use Modules\PkgBlog\Database\Seeders\{
    PostSeeder,
};


class PkgBlogSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            PostSeeder::class
        ]);
    }
}