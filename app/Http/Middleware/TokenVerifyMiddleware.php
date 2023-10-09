<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use App\Helper\ResponseHelper;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerifyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('token');

        if ($token === null) {
            return redirect('/');
        } else {
            $result = JWTToken::VerifyToken($token);

            if ($result == "unauthorized") {

               // return redirect('/');
                return ResponseHelper::Out('failed', 'unauthorized', [], 200);

            } 
            else {
                
                $request->headers->set('email', $result->userEmail);
                $request->headers->set('id', $result->userID);
                return $next($request);
            }

        }
      
    }
}
