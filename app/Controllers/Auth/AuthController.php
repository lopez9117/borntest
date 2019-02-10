<?php 



namespace App\Controllers\Auth;

use App\Controllers\Controller;


use Slim\Views\Twig as View;
use App\Models\User;
use Respect\Validation\Validator as v;


class AuthController extends Controller

{


	public function getSignOut($request, $response){

			 $this->auth->logout();


			 return "session finished";
	}





	public function getSignUp($request, $response){

			return "here create the view for register a user please use Postman :)";

	}	


	public function postSignUp($request, $response){

//create a rules of validation

			$validation = $this->validator->validate($request,[

		'email' => v::notEmpty()->EmailAvailable(),
		'name' => v::notEmpty(),
		'password' => v::notEmpty(),


			]);






			//if tha validation is true return the message 

			if( $validation->failed())

			{
				return "Emial is ready taken.";
			}



			// return "aqui devuelvo si el regitro es exitoso";

			// var_dump($request->getParams());

			User::create([


				'email'    => $request->getParam('email'),
				'name'     => $request->getParam('name'),
				'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),

				]);

			return "User Register success";

	}


// --------------------------------------------------------------------------------------------------------------------




		public function getSignIn($request, $response){

			return "here create the view for login a user please use Postman :)";

	}		


		public function postSignIn($request, $response){


			$auth = $this->auth->attempt(
					$request->getParam('email'),
					$request->getParam('password')

			);

			// var_dump($auth);

			return "access OK";	
	}	

}