<?php

namespace App\Services;

use App\Models\EnregistrementPrestation;
use App\Shared\ApiRequest\ApiRequest;
use App\Shared\Services\BaseService;


class EnregistrementPrestationService extends EnregistrementService
{

    public function __construct(EnregistrementPrestation $model, MutuelleDeSanteService $mutuelleService)
    {
        parent::__construct($model, $mutuelleService);
    }

    public function list(ApiRequest $request = null)
    {
        return $this->model::with(['mutuelle.commune.departement.region', 'mutuelle.type', 'type_prestation'])->consume($request);
    }


    public function show(int $id)
    {
        return $this->model::with(['mutuelle.commune.departement.region', 'mutuelle.type', 'type_prestation'])->findOrFail($id);
    }
}
