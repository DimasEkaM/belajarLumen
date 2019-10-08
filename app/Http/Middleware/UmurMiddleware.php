<?php

namespace App\Http\Middleware;

use Closure;

class UmurMiddleware
{
	public function handle($request,Closure $next)
	{
		if($request->umur <= 20){
			return "belum cukup umur";
		}
		return $next($request);
	}
}