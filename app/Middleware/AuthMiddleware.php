<?php 


namespace App\Middleware;

/**
 * 
 */
class AuthMiddleware extends Middleware
{
	
	

	public function __invoke($request, $response, $next){

        
		 // if(!$this->container->auth->check()) {

		 // 	 return "PLease Signin Before doing That.";



		 // }




			$response = $next($request, $response);

			return $response;

	}

}



