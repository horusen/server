<?php

namespace App\Services;

use App\Models\Region;
use App\Shared\ApiRequest\ApiRequest;
use App\Shared\Services\BaseService;


class RegionService extends BaseService
{

    public function __construct(Region $model)
    {
        parent::__construct($model);
    }
}
