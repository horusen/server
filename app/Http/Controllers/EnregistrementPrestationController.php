<?php

namespace App\Http\Controllers;

use App\Services\EnregistrementPrestationService;
use App\Shared\Controllers\BaseController;
use Illuminate\Http\Request;

class EnregistrementPrestationController extends EnregistrementController
{
    protected $validation = [
        'date' => 'required|date',
        'mutuelle' => 'required|integer|exists:mutuelle_de_santes,id',
        'type_prestation' => 'required|integer|exists:type_prestations,id'
    ];


    public function __construct(EnregistrementPrestationService $service)
    {
        parent::__construct($this->validation, $service);
    }
}
