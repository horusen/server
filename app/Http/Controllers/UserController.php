<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Shared\Controllers\BaseController;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public $validation = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
    ];


    public function __construct(UserService $service)
    {
        parent::__construct($this->validation, $service);
    }




    public function store(Request $request)
    {
        $request->validate($this->validation);
        return $this->service->add($request);
    }
}
