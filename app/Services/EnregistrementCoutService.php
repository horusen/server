<?php

namespace App\Services;

use App\Models\EnregistrementCout;
use App\Shared\ApiRequest\ApiRequest;
use App\Shared\Services\BaseService;


class EnregistrementCoutService extends EnregistrementService
{

    public function __construct(EnregistrementCout $model, MutuelleDeSanteService $mutuelleService)
    {
        parent::__construct($model, $mutuelleService);
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
