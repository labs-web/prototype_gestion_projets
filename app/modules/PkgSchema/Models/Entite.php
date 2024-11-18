
<?php

namespace Modules\PkgSchema\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Entite extends Model
{
    use HasFactory;

    protected $fillable = [
        &#39;nom&#39;, &#39;description&#39;
    ];


}
