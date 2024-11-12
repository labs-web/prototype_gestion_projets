<?php

namespace Modules\PkgProjets\App\Providers;

use Illuminate\Support\ServiceProvider;

class PkgProjetsServiceProvider extends ServiceProvider
{
    /**
     * Enregistrer les services dans l'application.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Effectuer les opérations de démarrage pour le module.
     *
     * @return void
     */
    public function boot()
    {
        // Charger les migrations du module
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // Charger les routes du module
        // Charger tous les fichiers de routes du dossier routes
        $routeFiles = glob(__DIR__ . '/../../routes/*.php');
        foreach ($routeFiles as $routeFile) {
            $this->loadRoutesFrom($routeFile);
        }
        
        // Charger les vues du module
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'pkg_projets');
    }
}
