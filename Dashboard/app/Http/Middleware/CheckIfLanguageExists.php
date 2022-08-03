<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponses;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CheckIfLanguageExists
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
        if(! $request->hasHeader('accept-language')){
            return $this->error(['accept-language'=>'Key Missed In Headers'],"Please Send Application Language");
        }
        if(! in_array($request->header('accept-language'),config('app.supported-lagnuages'))){
            return $this->error(['supported-languages'=>implode(',',config('app.supported-lagnuages'))],"This Language Not Supported");
        }
        App::setLocale($request->header('accept-language'));
        return $next($request);
    }
}
