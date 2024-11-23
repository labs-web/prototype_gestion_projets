<?php
// Ce fichier est maintenu par ESSARRAJ Fouad


namespace Modules\PkgPkgBlog\Repositories;

use Modules\PkgPkgBlog\Models\Post;
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
        'id', 'nom', 'description', 'created_at', 'updated_at'
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
            'id' => $data['id'],
'nom' => $data['nom'],
'description' => $data['description'],
'created_at' => $data['created_at'],
'updated_at' => $data['updated_at']
        ]);

        return $post;
    }
}
