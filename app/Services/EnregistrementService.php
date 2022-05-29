<?php

namespace App\Services;

use App\Shared\Services\BaseService;


class EnregistrementService extends BaseService
{

    private MutuelleDeSanteService $mutuelleService;

    public function __construct($model, MutuelleDeSanteService $mutuelleService)
    {
        parent::__construct($model);
        $this->mutuelleService = $mutuelleService;
    }

    public function storeBulkEnregistrement($arrayData)
    {
        $returnedData = [];

        foreach ($arrayData as $item) {
            if (!isset($item['mutuelle'])) continue;

            $mutuelleId = $this->mutuelleService->getMutuelleIdByLibelle($item['mutuelle']);

            if (!isset($mutuelleId)) continue;

            array_push($returnedData, $this->store(['mutuelle' => $mutuelleId] + $item));
        }

        return $returnedData;
    }
}
