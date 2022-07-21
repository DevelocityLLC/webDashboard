<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiResponseTrait;
class AssignGuard
{
      use ApiResponseTrait;

     public function handle(Request $request, Closure $next , $guard = null)
    {
        
        return auth($guard)->check() ? $next( $request ) : $this->apiResponse(null , 403 , 'Unauthorized');
        /*
        if($guard != null){
          auth()->shouldUse($guard);
        }
        if($request->user()->user_type == 'users' && $guard != 'user-api'){
            return $this->apiResponse(null , 403 , 'unauthintation User');
        }

        if($request->user()->user_type == 'admins' && $guard != 'admin-api'){
            return $this->apiResponse(null , 403 , 'unauthintation Admin');
        }

        return $next($request); 
        
        */
    }
}
