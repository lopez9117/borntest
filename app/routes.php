
<?php 

use App\Middleware\AuthMiddleware;

// $app->get('/home', function($request, $response){

// 	return $this->view->render($response , 'home.twig');

// });



$app->get('/', 'HomeController:index');
// -----------------------------------------------------------------------------------------------------------------------------------
$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
$app->post('/auth/signup', 'AuthController:postSignUp');

// -------------------------------------------------------------------------------------------------------------------------------------
$app->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');

$app->post('/auth/signin', 'AuthController:postSignIn');
//--------------------------------------------------------------------------------------------------------------------------------------


// $app->group('', function(){


// })->add(new  AuthMiddleware($container));



$app->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');


// -------------------------------------------------------------------------------------------------------------------------------------


$app->get('/auth/password/change', 'PasswordController:getChangePassword')->setName('auth.password.change');

$app->post('/auth/password/change', 'PasswordController:postChangePassword');

// ---------------------------------------------------------------------------------------------------------------------------------------
$app->get('/post/list', 'PostsController:index')->setName('post.list');

$app->post('/post/store', 'PostsController:store');
// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------


$app->get('/author/list', 'AuthorController:index')->setName('author.list');

$app->post('/author/store', 'AuthorController:store');


