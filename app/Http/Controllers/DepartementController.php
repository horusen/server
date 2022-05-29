<?php

namespace App\Http\Controllers;

use App\Services\DepartementService;
use App\Shared\Controllers\BaseController;
use Illuminate\Http\Request;

class DepartementController extends BaseController
{
    protected $validation = [
        'libelle' => 'required',
        'region' => 'required|integer|exists:regions,id'
    ];


    public function __construct(DepartementService $service)
    {
        parent::__construct($this->validation, $service);
    }

    public function getByRegion($region)
    {
        return $this->service->getByRegion($region);
    }
}
