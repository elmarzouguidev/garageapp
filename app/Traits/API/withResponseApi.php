<?php

declare(strict_types=1);

namespace App\Traits\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait withResponseApi
{
    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->header('X-Fixall', 'fixall-application');
    }
}
