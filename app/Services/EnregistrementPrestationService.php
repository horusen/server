<?php

namespace App\Services;

use App\Models\EnregistrementPrestation;
use App\Shared\ApiRequest\ApiRequest;
use App\Shared\Services\BaseService;


class EnregistrementPrestationService extends EnregistrementService
{

    public function __construct(EnregistrementPrestation $model, MutuelleDeSanteService $mutuelleService)
    {
        parent::__construct($model, ['mutuelle.commune.departement.region', 'mutuelle.type', 'type_prestation'], $mutuelleService);
    }
}
