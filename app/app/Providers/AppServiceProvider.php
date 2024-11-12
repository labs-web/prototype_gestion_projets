<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Enregistrement statique des ServiceProviders 
        // $this->app->register(PkgArticlesServiceProvider::class);
        // $this->app->register(PkgCategoriesServiceProvider::class);

        // Charger tous les ServiceProviders des modules
        $this->loadModuleServiceProviders();
    }

    /**
     * Migration by packages.
     */
    public function boot(): void
    {
        // $this->loadMigrationsFrom($this->getMigrationPaths());
        
        // TODO : add comment and doc
        Paginator::useBootstrap();
    }

    /**
     * Get all migration paths.
     *
     * @return array
     */
    // protected function getMigrationPaths(): array
    // {
    //     $migrationsPath = database_path('migrations');
    //     return $this->getAllSubdirectoriesOptimized($migrationsPath);
    // }

    // /**
    //  * Get all subdirectories.
    //  *
    //  * @param string $dir
    //  * @return array
    //  */
    // protected function getAllSubdirectoriesOptimized(string $dir): array
    // {
    //     $subdirectories = [];
    //     $items = scandir($dir);

    //     foreach ($items as $item) {
    //         if ($item !== '.' && $item !== '..') {
    //             $path = $dir . DIRECTORY_SEPARATOR . $item;
    //             if (is_dir($path)) {
    //                 $subdirectories[] = $path;
    //                 $subdirectories = array_merge($subdirectories, $this->getAllSubdirectoriesOptimized($path));
    //             }
    //         }
    //     }

    //     return $subdirectories;
    // }



    
/**
     * Charger les ServiceProviders dynamiquement depuis les modules.
     *
     * @return void
     */
    protected function loadModuleServiceProviders()
    {
        // Définir le chemin vers le dossier contenant les ServiceProviders des modules
        $moduleProvidersPath = base_path('modules'); // Path du dossier des modules
        
      
        // Récupérer tous les fichiers de type ServiceProvider dans ce dossier
        $providerFiles = glob($moduleProvidersPath . '/*/App/Providers/*ServiceProvider.php');

      
       
        foreach ($providerFiles as $providerFile) {
            // Inclure le fichier PHP du ServiceProvider
            $providerClass = $this->getProviderClass($providerFile);

        
            // Vérifier si la classe existe, puis l'enregistrer
            if (class_exists($providerClass)) {
                
                $this->app->register($providerClass);
                
            }
        }
    }

    /**
     * Récupérer la classe du ServiceProvider à partir du fichier PHP.
     *
     * @param string $file
     * @return string
     */
    protected function getProviderClass(string $file): string
    {
        
        // Transformer le chemin de fichier en nom de classe PHP avec namespace
        $relativePath = str_replace(base_path(), '', $file); // Obtenir le chemin relatif
       
        $relativePath = str_replace('/', '\\', $relativePath); // Convertir les / en \
        $relativePath = trim($relativePath, '\\'); // Supprimer les \ en trop
        $relativePath = str_replace('.php', '', $relativePath); 
        // Remplacer uniquement "module" par "Module" au début du chemin
       
        if (substr($relativePath, 0, 7) === 'modules') {
             $relativePath = 'Modules' . substr($relativePath, 7);
        }
    
        // Exemple : Modules\PkgArticles\App\Providers\PkgArticlesServiceProvider
        return  $relativePath;
    }

}
