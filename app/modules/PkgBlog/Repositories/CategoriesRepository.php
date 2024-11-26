<?php
// Ce fichier est maintenu par ESSARRAJ Fouad



namespace Modules\PkgBlog\Repositories;

use Modules\PkgBlog\Models\Categories;
use App\Repositories\BaseRepository;

/**
 * Classe CategoriesRepository pour gérer la persistance de l'entité Categories.
 */
class CategoriesRepository extends BaseRepository
{
    /**
     * Les champs de recherche disponibles pour categories.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'name',
        'description'
    ];

    /**
     * Renvoie les champs de recherche disponibles.
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

    /**
     * Constructeur de la classe CategoriesRepository.
     */
    public function __construct()
    {
        parent::__construct(new Categories());
    }

    /**
     * Crée une nouvelle instance de categories.
     *
     * @param array $data Données pour la création.
     * @return mixed
     */
    public function create(array $data)
    {
        return parent::create($data);
    }
}
