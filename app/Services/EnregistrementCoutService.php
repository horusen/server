<?php

namespace App\Services;

use App\Models\EnregistrementCout;
use App\Shared\ApiRequest\ApiRequest;
use App\Shared\Services\BaseService;


class EnregistrementCoutService extends EnregistrementService
{

    public function __construct(EnregistrementCout $model, MutuelleDeSanteService $mutuelleService)
    {
        parent::__construct($model, ['mutuelle.commune.departement.region', 'mutuelle.type'], $mutuelleService);
    }
}
