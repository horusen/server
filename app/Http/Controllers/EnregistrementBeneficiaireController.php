<?php

namespace App\Http\Controllers;

use App\Services\EnregistrementBeneficiaireService;
use App\Shared\Controllers\BaseController;
use Illuminate\Http\Request;

class EnregistrementBeneficiaireController extends EnregistrementController
{
    protected $validation = [
        'mutuelle' => 'required|integer|exists:mutuelle_de_santes,id',
        'nombre_adherent' => 'required',
        'nombre_beneficiaire' => 'required',
        'nombre_beneficiaire_a_jour' => 'required',
        'dette_etat' => 'required',
    ];


    public function __construct(EnregistrementBeneficiaireService $service)
    {
        parent::__construct($this->validation, $service);
    }
}
