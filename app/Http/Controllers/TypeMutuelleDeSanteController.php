<?php

namespace App\Http\Controllers;

use App\Services\TypeMutuelleDeSanteService;
use Illuminate\Http\Request;
use App\Shared\Controllers\BaseController;

class TypeMutuelleDeSanteController extends BaseController
{
    protected $validation = [
        'libelle' => 'required'
    ];


    public function __construct(TypeMutuelleDeSanteService $service)
    {
        parent::__construct($this->validation, $service);
    }
}
