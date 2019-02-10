<?php 



namespace App\Controllers\Auth;

use App\Controllers\Controller;


use Slim\Views\Twig as View;
use App\Models\User;
use Respect\Validation\Validator as v;


class PasswordController extends Controller

{



	public function getChangePassword($request, $response)
	{

			return "here create the view for chage the password";
	}

	public function postChangePassword($request, $response)
	{


			$validation = $this->validator->validate($request,[

	
		'password' => v::notEmpty(),


			]);

				if( $validation->failed())

			{
				return "The password is empty.";
			}


			$this->auth->user()->setPassword($request->getParam('password'));

			return "your Password was Changed";



	}



}