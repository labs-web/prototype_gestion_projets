<?php


namespace Modules\PkgSchema\Database\Seeders;


use Illuminate\Database\Seeder;
use Modules\PkgSchema\Models\Entite;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Schema;



class EntitesSeeder extends Seeder
{
    public function run(): void
    {
        $AdminRole = User::ADMIN;
        $MembreRole = User::MEMBRE;

        Schema::disableForeignKeyConstraints();
        Entite::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/entites.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {


            if (!$firstline) {
                Entite::create([
                    
                        "id"=>$data[0],
                    
                        "nom"=>$data[1],
                    
                        "description"=>$data[2],
                    
                        "created_at"=>$data[3],
                    
                        "updated_at"=>$data[4]
                    
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "EntiteController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        $entiteManagerRolePermissions = [
            'index-EntiteController',
            'show-EntiteController',
            'create-EntiteController',
            'store-EntiteController',
            'edit-EntiteController',
            'update-EntiteController',
            'destroy-EntiteController',
            'export-EntiteController',
            'import-EntiteController'
        ];

        $entiteMembreRolePermissions = [
            'index-EntiteController',
            'show-EntiteController',
        ];

        $admin = Role::where('name', $AdminRole)->first();
        $membre = Role::where('name', $MembreRole)->first();

        $admin->givePermissionTo($entiteManagerRolePermissions);
        $membre->givePermissionTo($entiteMembreRolePermissions);

    }
}
