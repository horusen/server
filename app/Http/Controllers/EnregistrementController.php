<?php

namespace App\Http\Controllers;

use App\Shared\Controllers\BaseController;
use Illuminate\Http\Request;

class EnregistrementController extends BaseController
{



    public function __construct($validation, $service)
    {
        parent::__construct($validation, $service);
    }


    public function storeBulkEnregistrement(Request $requrest)
    {
        return $this->service->storeBulkEnregistrement($requrest->all());
    }
}
