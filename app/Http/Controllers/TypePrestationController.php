<?php

namespace App\Http\Controllers;

use App\Services\TypePrestationService;
use App\Shared\Controllers\BaseController;
use Illuminate\Http\Request;

class TypePrestationController extends BaseController
{
    protected $validation = [
        'libelle' => 'required'
    ];


    public function __construct(TypePrestationService $service)
    {
        parent::__construct($this->validation, $service);
    }
}
