<?php

namespace App\Services;

use App\Models\User;
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


    public function edit(Request $request, int $id)
    {


        $inscription = User::findOrFail($id);

        $inscription->update($request->all());


        return $inscription;
    }
}
