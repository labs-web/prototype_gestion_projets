<?php
// Ce fichier est maintenu par ESSARRAJ Fouad


namespace Modules\PkgBlog\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\PkgBlog\Models\Post;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $AdminRole = User::ADMIN;
        $MembreRole = User::MEMBRE;

        Schema::disableForeignKeyConstraints();
        Post::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("modules/PkgBlog/Database/data/posts.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== false) {
            if (!$firstline) {
                Post::create([
                    "nom" => $data[0] ,
                    "description" => $data[1] 
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);

        $actions = [
            'index',
            'show',
            'create',
            'store',
            'edit',
            'update',
            'destroy',
            'export',
            'import'
        ];

        foreach ($actions as $action) {
            Permission::create(['name' => $action . '-PostController', 'guard_name' => 'web']);
        }

        $admin = Role::where('name', $AdminRole)->first();
        $membre = Role::where('name', $MembreRole)->first();

        $admin->givePermissionTo([
            'index-PostController',
            'show-PostController',
            'create-PostController',
            'store-PostController',
            'edit-PostController',
            'update-PostController',
            'destroy-PostController',
            'export-PostController',
            'import-PostController',
        ]);

        $membre->givePermissionTo([
            'index-PostController',
            'show-PostController'
        ]);
    }
}
