<?php

namespace Database\Seeders\pkg_blog;

use Illuminate\Database\Seeder;
use App\Models\pkg_blog\Projet;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Schema;


class ProjetsSeeder extends Seeder
{
    public function run(): void
    {
        $AdminRole = User::ADMIN;
        $MembreRole = User::MEMBRE;

        Schema::disableForeignKeyConstraints();
        Projet::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/projets.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {


            if (!$firstline) {
                Projet::create([

                    
                        "id"=>$data[0],
                    
                        "nom"=>$data[1],
                    
                        "description"=>$data[2],
                    
                        "created_at"=>$data[3],
                    
                        "updated_at"=>$data[4],
                    
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "ProjetController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        $projetManagerRolePermissions = [
            'index-ProjetController',
            'show-ProjetController',
            'create-ProjetController',
            'store-ProjetController',
            'edit-ProjetController',
            'update-ProjetController',
            'destroy-ProjetController',
            'export-ProjetController',
            'import-ProjetController'
        ];

        $projetMembreRolePermissions = [
            'index-ProjetController',
            'show-ProjetController',
        ];

        $admin = Role::where('name', $AdminRole)->first();
        $membre = Role::where('name', $MembreRole)->first();

        $admin->givePermissionTo($projetManagerRolePermissions);
        $membre->givePermissionTo($projetMembreRolePermissions);

    }
}
