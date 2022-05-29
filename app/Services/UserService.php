<?php

namespace App\Services;

use App\Models\User;
use App\Shared\ApiRequest\ApiRequest;
use App\Shared\Services\BaseService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Swift_TransportException;

class UserService extends BaseService
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function add(Request $request)
    {

        $inscription = User::create($request->all() + ['inscription' => Auth::id()]);


        try {
            $inscription->sendEmailVerificationNotification();
        } catch (Exception $e) {
            $inscription->forceDelete();
            throw new Swift_TransportException($e);
        }


        return $this->model::find($inscription->id);
    }

    public function list(ApiRequest $request = null)
    {
        return $this->model::with($this->with)->where('id', '!=', 1)->latest()->consume($request);
    }

    public function update(int $id, array $data)
    {
        $user = $this->model::find($id);

        if (!isset($user)) throw new Exception("Utisateur inexistant");

        // Check if emai has not been already taken
        $u = $this->model::where('id', '!=', $id)->where('email', $data['email'])->first();
        if (isset($u)) throw new Exception("L'email a été deja pris.", 422);

        $user->update($data);
        return $this->show($id);
    }

    public function accountEdit($id, array $data)
    {

        // Check if emai has not been already taken
        $u = $this->model::where('id', '!=', $id)->where('email', $data['email'])->first();
        if (isset($u)) throw new Exception("L'email a été deja pris.", 422);

        $user = $this->model::find($id);

        if (!isset($user)) throw new Exception("Utisateur inexistant");

        if (password_verify($data['password'], $user->password)) {
            $user->name = $data['name'];
            $user->email = $data['email'];

            if ($data['new_password']) $user->password = $data['new_password'];

            $user->save();

            return $user;
        }

        throw new Exception("Mot de passe erroné");
    }
}
