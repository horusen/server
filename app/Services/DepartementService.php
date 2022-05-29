<?php

namespace App\Services;

use App\Models\Departement;
use App\Shared\ApiRequest\ApiRequest;
use App\Shared\Services\BaseService;


class DepartementService extends BaseService
{

    public function __construct(Departement $model)
    {
        parent::__construct($model);
    }

    public function list(ApiRequest $request = null)
    {
        return $this->model::with(['region'])->consume($request);
    }

    public function getByRegion($region)
    {
        return $this->model::where('region', $region)->consume(null);
    }
}
