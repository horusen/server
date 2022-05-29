<?php

namespace App\Services;

use App\Models\TypePrestation;
use App\Shared\Services\BaseService;


class TypePrestationService extends BaseService
{

    public function __construct(TypePrestation $model)
    {
        parent::__construct($model);
    }
}
