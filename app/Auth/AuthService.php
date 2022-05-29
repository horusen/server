<?php

namespace App\Auth;

use App\Models\User;
use Exception;

class AuthService
{
    public function login($data)
    {
        $user = User::where('email', $data['email'])->first();

        if (!isset($user)) throw new Exception("Email invalide");

        if (password_verify($data['password'], $user->password)) {

            $token = $user->createToken('authToken');


            return response()->json([
                'access_token' => $token->plainTextToken,
                'user' => $user,
                'token_type' => 'Bearer',
            ]);
        }

        throw new Exception("Mot de passe invalide", 401);
    }
}
