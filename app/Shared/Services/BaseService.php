<?php

namespace App\Shared\Services;

use App\Shared\ApiRequest\ApiRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

abstract class BaseService
{
    protected Model $model;
    protected array $with;

    public function __construct(Model $model, array $with = [])
    {
        $this->model = $model;
        $this->with = $with;
    }


    public function list(ApiRequest $request = null)
    {
        return $this->model::with($this->with)->latest()->consume($request);
    }


    public function show(int $id)
    {
        return $this->model::with($this->with)->findOrFail($id);
    }


    public function store(array $data)
    {
        $element = $this->model::create($data + ['inscription' => Auth::id()]);
        return $this->show($element->id);
    }

    public function update(int $id, array $data)
    {
        $element = $this->model::find($id);
        $element->update($data);
        return $this->show($id);
    }



    public function destroy($id)
    {
        $element = $this->model::findOrFail($id);
        $element->delete();
        return null;
    }
}
