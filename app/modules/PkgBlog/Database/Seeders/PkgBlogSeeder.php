<?php
// Ce fichier est maintenu par ESSARRAJ Fouad



namespace Modules\PkgBlog\Database\Seeders;
use Modules\Core\Database\Seeders\CoreSeeder;

class PkgBlogSeeder extends CoreSeeder
{
    public function run(): void
    {
        parent::load_and_run(__DIR__,__NAMESPACE__);
    }
}