<?php

namespace App\Auth;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class VerificationController extends Controller
{
    // TODO: Mettre en place une signature pour l'url
    public function update(Request $request)
    {
        if ($request->hasValidSignature()) {
            $id = $request->query('id');
            $hashed_email = $request->query('hash');

            $user = User::findorFail($id);

            if (Hash::check($user->email, $hashed_email)) {
                $signedURL = URL::temporarySignedRoute('register.check', Carbon::now()->addMinutes(30), ['id' => $id]);
                return redirect()->away(
                    env('FRONTEND_URL', 'http://localhost:4200') . '/authentification/inscription?' . explode('?', $signedURL)[1]
                );
            }

            return redirect()->away(env('FRONTEND_URL', 'http://localhost:4200') . '/bad-url');
        }


        return redirect()->away(env('FRONTEND_URL', 'http://localhost:4200') . '/bad-url');
    }

    public function check(Request $request)
    {
        if ($request->hasValidSignature()) {
            $inscription =  User::findOrFail($request->query('id'));
            if ($inscription->email_verified_at) {
                return response()->json(['message' => 'L\'enregistrement de l\'utilisateur a été déjà validé'], 403);
            }

            return $inscription;
        }

        return response()->json(['message' => 'URL invalide ou expiré'], 403);
    }


    public function resend(User $user)
    {
        if ($user->hasVerifiedEmail()) {
            return response()->json(["message" => "L'email a deja été verifié."], 400);
        }

        $user->sendEmailVerificationNotification();

        return response()->json(["message" => "Email verification link sent on your email id"]);
    }
}
