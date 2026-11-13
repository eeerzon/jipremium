<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckApiSecretKey
{
    public function handle(Request $request, Closure $next)
    {
        $secretKey = $request->header('API-Secret-Key');

        $expectedKey = (string) config('services.jipremium.secret_key');

        // hash_equals compares in constant time, so the key can't be guessed from response timing.
        if (!$secretKey || $expectedKey === '' || !hash_equals($expectedKey, (string) $secretKey)) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Invalid or missing secret key.',
                'data'    => null,
            ], 401);
        }

        return $next($request);
    }
}