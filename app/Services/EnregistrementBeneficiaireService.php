<?php

namespace App\Services;

use App\Models\EnregistrementBeneficiaire;
use App\Shared\ApiRequest\ApiRequest;
use App\Shared\Services\BaseService;


class EnregistrementBeneficiaireService extends EnregistrementService
{

    public function __construct(EnregistrementBeneficiaire $model, MutuelleDeSanteService $mututelleService)
    {
        parent::__construct($model, $mututelleService);
    }

    public function list(ApiRequest $request = null)
    {
        return $this->model::with(['mutuelle.commune.departement.region', 'mutuelle.type'])->consume($request);
    }


    public function show(int $id)
    {
        return $this->model::with(['mutuelle.commune.departement.region', 'mutuelle.type'])->findOrFail($id);
    }
}
