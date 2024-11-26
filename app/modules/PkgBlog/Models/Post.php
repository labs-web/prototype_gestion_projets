<?php
// Ce fichier est maintenu par ESSARRAJ Fouad


namespace Modules\PkgBlog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Modules\${entity.package.PkgName}\Models\Categorie;
use Modules\${entity.package.PkgName}\Models\User;
use Modules\${entity.package.PkgName}\Models\Tag;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'user_id', 'title', 'content', 'published_at'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'category_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'post_tags')->withTimestamps();
    }
}
