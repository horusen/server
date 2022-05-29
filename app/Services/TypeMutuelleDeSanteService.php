<?php


namespace App\Services;

use App\Models\TypeMutuelleDeSante;
use App\Shared\Services\BaseService;


class TypeMutuelleDeSanteService extends BaseService
{

    public function __construct(TypeMutuelleDeSante $model)
    {
        parent::__construct($model);
    }
}
