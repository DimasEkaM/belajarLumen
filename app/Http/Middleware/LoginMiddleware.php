<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class LoginMiddleware
{


	public function handle($request, Closure $next){
		
		if($request->input('token')){
			$check = User::where('token',$request->input('token'))->first();

		if(!$check){
			return response('Token Invalid.',401);
		} else{
			return $next($request);
		}

		}
		 else{
			return response('Masukan token. ',401);
		}	
	}
}