<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CoreSeeder extends Seeder
{

    public function loadAndRun(string $moduleSeederDir, string $moduleNamespace): void
    {

        $parts = explode('\\', $moduleNamespace);
        $moduleName = $parts[1]; // Accède au deuxième élément du tableau, qui est "PkgBlog"

 
       
        // Filter out the current module's seeder file
        $moduleSeederFile = $moduleName . 'Seeder.php';
 
        $seeders = collect(File::files($moduleSeederDir))
            ->filter(fn ($file) => $file->getFilename() !== $moduleSeederFile)
            ->map(fn ($file) => $moduleNamespace . '\\' . pathinfo($file->getFilename(), PATHINFO_FILENAME))
            ->filter(fn ($class) => class_exists($class));

      
        $this->call($seeders->toArray());
       
    }


    // public function load_and_run($seeders_dir,$namesapce_dir): void
    // {

    //     $module_name = str_split($namesapce_dir,"/")[1];
    //     dd($module_name);
    //     $module_seeder_file_name =  $module_name . "Seeder.php" ;

    //     // Charger dynamiquement tous les seeders dans le répertoire
    //     // sauf bien sur le fichier de module
    //     $seeders = collect(File::files($seeders_dir))->map(function ($file)  use ($namesapce_dir,$module_seeder_file_name) {
    //         $fileName = $file->getFilename();
    //         $class = $namesapce_dir . '\\' . pathinfo($fileName, PATHINFO_FILENAME);
            
    //         if($fileName ==  $module_seeder_file_name ) {return null;}

    //         return class_exists($class) ? $class : null;
    //     })->filter();

    //     // Exécuter tous les seeders trouvés
    //     $this->call($seeders->toArray());
    // }
}