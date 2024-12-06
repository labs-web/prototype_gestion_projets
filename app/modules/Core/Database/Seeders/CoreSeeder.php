<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CoreSeeder extends Seeder
{
    public function load_and_run($seeders_dir,$namesapce_dir): void
    {
        // Charger dynamiquement tous les seeders dans le répertoire
        $seeders = collect(File::files($seeders_dir))->map(function ($file)  use ($namesapce_dir) {
            $class = $namesapce_dir . '\\' . pathinfo($file->getFilename(), PATHINFO_FILENAME);
            return class_exists($class) ? $class : null;
        })->filter();

        // Exécuter tous les seeders trouvés
        $this->call($seeders->toArray());
    }
}