<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class provider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard=null)
    {
      if(Auth::guard($guard)->guest())
      {
        if($request->ajax())
        {
          return response('Unauthorized.',401);
        }
        else
        {
          return redirect()->guest('login');
        }
      }
      else if(!Auth::guard($guard)->user()->userMembership->type)
      {
        return back();
      }
        return $next($request);
    }
}
