<?php

namespace App\Shared\Services;

use App\Shared\ApiRequest\ApiRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

abstract class BaseService
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function list(ApiRequest $request = null)
    {
        return $this->model::consume($request);
    }


    public function show(int $id)
    {
        return $this->model::findOrFail($id);
    }


    public function store(array $data)
    {
        $element = $this->model::create($data + ['inscription' => Auth::id()]);
        return $this->model::find($element->id);
    }

    public function update(int $id, array $data)
    {
        $element = $this->model::find($id);
        $element->update($data);
        return $element->refresh();
    }



    public function destroy($id)
    {
        $element = $this->model::findOrFail($id);
        $element->delete();
        return null;
    }
}
