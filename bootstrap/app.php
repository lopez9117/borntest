<?php 

use Respect\Validation\Validator as v;

session_start();

require __DIR__ . '/../vendor/autoload.php';



// $user  = new \App\Models\User;


// var_dump($user);
// die();



$app = new \Slim\App([

	'settings' => [

		 // Slim Settings
    'determineRouteBeforeAppMiddleware' => true,
    'displayErrorDetails' => true,
    'addContentLengthHeader' => false,

    'db' => [

		'driver' => 'mysql',
		'host'   => 'localhost',
		'database' => 'borntest',
		'username' => 'root',
		'password' => '',
		'charset'  => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    =>'',

	]



	],

	

]);


$container = $app->getContainer();


$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();


$container['db'] = function ($container) use ($capsule){
	return $capsule;
};



$container['view'] = function($container){

		$view = new  \Slim\Views\Twig(__DIR__ .'/../resources/views', [

				'cache' => false,
		]);

		$view->addExtension(new \Slim\Views\TwigExtension(

				$container->router,
				$container->request->getUri()
		));

		return $view;
};



$container['validator'] = function ($container){

	return new App\Validation\Validator;

};



$container['HomeController'] = function ($container){

	return new \App\Controllers\HomeController($container);

};


$container['AuthController'] = function ($container){

	return new \App\Controllers\Auth\AuthController($container);

};

$container['PasswordController'] = function ($container){

	return new \App\Controllers\Auth\PasswordController($container);

};


$container['PostsController'] = function ($container){

	return new \App\Controllers\PostsController($container);

};

$container['AuthorController'] = function ($container){

	return new \App\Controllers\AuthorController($container);

};


$container['auth'] = function($container){

	return new \App\Auth\Auth;

};

$app->add(new \App\Middleware\AuthMiddleware($container));
	


v::with('App\\Validation\\Rules\\');


require __DIR__ . '/../app/routes.php';