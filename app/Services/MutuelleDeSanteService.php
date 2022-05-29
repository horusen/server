<?php

namespace App\Services;

use App\Models\MutuelleDeSante;
use App\Shared\ApiRequest\ApiRequest;
use App\Shared\Services\BaseService;


class MutuelleDeSanteService extends BaseService
{

    public function __construct(MutuelleDeSante $model)
    {
        parent::__construct($model);
    }

    public function list(ApiRequest $request = null)
    {
        return $this->model::with(['commune.departement.region', 'type'])->consume($request);
    }

    public function getByCommuneAndByType($commune, $type)
    {
        return $this->model::where('type', $type)->where('commune', $commune)->consume(null);
    }

    public function getMutuelleIdByLibelle($libelle)
    {
        return $this->model::where('libelle', 'like', '%' . $libelle . '%')->first(['id'])->id;
    }
}
