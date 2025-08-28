<?php

namespace App\Services\Api\V1;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

abstract class BaseService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.omnigreja_api.base_url');
    }

    protected function client()
    {

     //  Log::info('Chamando API', ['url' => $this->baseUrl]);
        return Http::baseUrl($this->baseUrl)
            ->timeout(10)
            ->acceptJson()
            ->retry(3, 100) // retry 3x com 100ms
            ->throw(); // lança exception em caso de erro;
    }

}
