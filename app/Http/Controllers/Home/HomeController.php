<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\JsonResponse;

final class HomeController
{
    /**
     * @return JsonResponse
     */
    public function indexHome(): JsonResponse
    {
        return response()->json();
    }
}
