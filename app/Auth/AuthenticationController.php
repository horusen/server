<?php

namespace App\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    private $userService;
    private $authService;

    public function __construct(UserService $userService, AuthService $authService)
    {
        $this->userService = $userService;
        $this->authService = $authService;
    }

    private function validateLoginRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
    }


    public function register(int $id, Request $request)
    {
        $request->validate(['name' => 'required', 'email' => 'required|exists:users,email', 'password' => 'required|confirmed']);
        $user =  $this->userService->update($id, $request->all() + ['etat' => 2]);
        $user->markEmailAsVerified();
        return $this->login($request);
    }


    public function login(Request $request)
    {
        $this->validateLoginRequest($request);
        return $this->authService->login($request->all());
    }


    public function logout()
    {
        Auth::logout();
        return null;
    }


    public function me()
    {
        return Auth::user();
    }
}
