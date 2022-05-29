<?php

namespace App\Http\Controllers;

use App\Services\CommuneService;
use App\Shared\Controllers\BaseController;

class CommuneController extends BaseController
{
    protected $validation = [
        'libelle' => 'required',
        'departement' => 'required|integer|exists:departements,id'
    ];


    public function __construct(CommuneService $service)
    {
        parent::__construct($this->validation, $service);
    }

    public function getByDepartement($departement)
    {
        return $this->service->getByDepartement($departement);
    }
}
