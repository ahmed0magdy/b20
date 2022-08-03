<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponses;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfAdminVerified
{
    use ApiResponses;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(! Auth::guard('sanctum')->check()){
            return $this->error([],"Unauthorized",401);
        }
        if(is_null(Auth::guard('sanctum')->user('sanctum')->email_verified_at)){
            return $this->error([],"Not Verified",401);
        }
        return $next($request);
    }
}
