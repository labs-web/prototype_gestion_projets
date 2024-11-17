<?php

use Illuminate\Support\Facades\Config;

/**
 * Affichage de titre de page index 
 * exemple : Liste des projets
 *
 * @param string $entity_plural_name
 * @return string
 */
function curd_index_title(string $entity_plural_name): string
{
    // Get the current locale from the configuration
    $lang = Config::get('app.locale', 'en'); // Default to 'en' if not set

    $titles = [
        'fr' => 'Liste des ' . strtolower( $entity_plural_name),
        'en' => 'List of :' . strtolower($entity_plural_name) ,
    ];

    // Get the appropriate title
    $title = $titles[$lang] ?? $titles['en'];

    return $title;
}



// function curd_index_title(string $entity_plural_name, string $lang): string
// {
//     $titles = [
//         'fr' => 'Liste des :class',
//         'en' => 'List of :class',
//     ];

//     $lang = ($lang == 'fr') ? 'fr' : 'en';
//     $translatedClass = $entity_plural_name;
//     $translationKey = $titles[$lang];
//     return trans($translationKey, ['class' => $translatedClass]);
// }

