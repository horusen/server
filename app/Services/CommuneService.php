<?php

namespace App\Services;

use App\Models\Commune;
use App\Shared\ApiRequest\ApiRequest;
use App\Shared\Services\BaseService;


class CommuneService extends BaseService
{

    public function __construct(Commune $model)
    {
        parent::__construct($model);
    }
    public function list(ApiRequest $request = null)
    {
        return $this->model::with(['departement'])->consume($request);
    }

    public function getByDepartement($departement)
    {
        return $this->model::where('departement', $departement)->consume(null);
    }
}
