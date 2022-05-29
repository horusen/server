<?php

namespace App\Http\Controllers;

use App\Services\EnregistrementCoutService;
use App\Shared\Controllers\BaseController;

class EnregistrementCoutController extends EnregistrementController
{
    protected $validation = [
        'date' => 'required|date',
        'mutuelle' => 'required|integer|exists:mutuelle_de_santes,id'
    ];


    public function __construct(EnregistrementCoutService $service)
    {
        parent::__construct($this->validation, $service);
    }
}
