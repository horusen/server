<?php

namespace App\Http\Controllers;

use App\Services\RegionService;
use App\Shared\Controllers\BaseController;
use Illuminate\Http\Request;

class RegionController extends BaseController
{
    protected $validation = [
        'libelle' => 'required'
    ];


    public function __construct(RegionService $service)
    {
        parent::__construct($this->validation, $service);
    }
}
