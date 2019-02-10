<?php 



namespace App\Controllers;


use Slim\Views\Twig as View;
use App\Models\User;
use App\Models\Post;


class HomeController extends Controller

{



public function index($request, $response)


	{
		

			// $posts = Post::all();

			// return  json_encode($posts);
			// die();	


			return $this->container->view->render($response, 'home.twig');

	}			


}