<?php

namespace Modules\PkgProjets\App\Exceptions;

use App\Exceptions\BusinessException;

class ProjectAlreadyExistException extends BusinessException
{
    public static function createProject()
    {
        return new self(__('PkgProjets::projet/message.createProjectException'));
    }
}