<?php

namespace App\Shared\ApiRequest;

use Illuminate\Database\Eloquent\Builder;

trait ApiRequestConsumer
{
    public function scopeConsume(Builder $query, ApiRequest $apiRequest = null)
    {
        if (isset($apiRequest)) {
            return $apiRequest->apply($query);
        }

        return response()->json(['data' => $query->get()], 200);
    }
}
