<?php

namespace Modules\PkgProjets\App\Exceptions;

use App\Exceptions\BusinessException;

class TagAlreadyExistException extends BusinessException
{
    public static function createTag()
    {
        return new self(__('GestionProjets/tag/message.createTagException'));
    }
}