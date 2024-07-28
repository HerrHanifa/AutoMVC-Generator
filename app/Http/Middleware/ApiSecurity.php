<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiSecurity
{
    public function handle($request, Closure $next)
    {
    // if ($request->header('API-KEY') != '123456789') {
    //  return response()->json(['error' => 'Unauthorized'],401);
    // }

    return $next($request);
    }
}
