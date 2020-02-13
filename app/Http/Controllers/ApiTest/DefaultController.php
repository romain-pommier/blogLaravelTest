<?php

namespace App\Http\Controllers\ApiTest;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function test()
    {
        return response()->json('yo!');

    }
}
