<?php

namespace App\Http\Middleware;

use App\Models\ApiKeys;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeysMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header("X-API-KEY");

        if(!$apiKey || !ApiKeys::where('api_key', $apiKey)->exists()){
            return response()->json(["message" => "Unauthorized"], 401);
        }

        return $next($request);
    }
}
