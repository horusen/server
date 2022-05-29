<?php

namespace App\Http\Controllers;

use App\Services\MutuelleDeSanteService;
use App\Shared\Controllers\BaseController;

class MutuelleDeSanteController extends BaseController
{
    protected $validation = [
        'libelle' => 'required',
        'type' => 'required|integer|exists:type_mutuelle_de_santes,id',
        'commune' => 'required|integer|exists:communes,id',
    ];


    public function __construct(MutuelleDeSanteService $service)
    {
        parent::__construct($this->validation, $service);
    }


    public function getByCommuneAndByType($commune, $type)
    {
        return $this->service->getByCommuneAndByType($commune, $type);
    }
}
