<?php
// Ce fichier est maintenu par ESSARRAJ Fouad



namespace Modules\PkgBlog\Repositories;

use Modules\PkgBlog\Models\Post;
use App\Repositories\BaseRepository;

/**
 * Classe PostRepository pour gérer la persistance de l'entité Post.
 */
class PostRepository extends BaseRepository
{
    /**
     * Les champs de recherche disponibles pour posts.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'nom',
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
     * Constructeur de la classe PostRepository.
     */
    public function __construct()
    {
        parent::__construct(new Post());
    }

    /**
     * Crée une nouvelle instance de post.
     *
     * @param array $data Données pour la création.
     * @return mixed
     */
    public function create(array $data)
    {
        $post = parent::create([
            'nom' => $data['nom'],
            'description' => $data['description'],
        ]);

        return $post;
    }
}
