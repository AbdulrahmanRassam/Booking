<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExtrnalClients
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( $request->header('key')=='samhKey75fghfvhgcgcgfcgfccxxcc') {

            $request->headers->set('Accept', 'application/json');
            return $next($request);
        }else {
            return Response([
                'msg'=>' unAuthorised Client ....',
                'status'=>false,
                'data'=>[]

            ]);
        }
    }
}
