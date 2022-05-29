<?php

namespace App\Services;

use App\Models\EnregistrementBeneficiaire;
use App\Shared\ApiRequest\ApiRequest;
use App\Shared\Services\BaseService;


class EnregistrementBeneficiaireService extends EnregistrementService
{

    public function __construct(EnregistrementBeneficiaire $model, MutuelleDeSanteService $mututelleService)
    {
        parent::__construct($model, ['mutuelle.commune.departement.region', 'mutuelle.type'], $mututelleService);
    }
}
