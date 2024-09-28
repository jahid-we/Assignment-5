<?php

namespace App\Http\Middleware;

use Closure;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token=$request->cookie('adminToken');
        $result=JWTToken::VerifyToken($token);
        if($result=="unauthorized"){
            return redirect('/adminLogin');
        }
        else{
            $request->headers->set('email',$result->userEmail);
            $request->headers->set('id',$result->userId);
            $request->headers->set('userRoll',$result->userRoll);
            return $next($request);
        }
    }
}
