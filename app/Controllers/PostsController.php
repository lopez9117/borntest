<?php

namespace App\Controllers;

use Illuminate\Pagination\Paginator;
use Slim\Views\Twig as View;
use App\Models\Post;
use Respect\Validation\Validator as v;

class postsController extends Controller
{
    
    public function index()
    {
        
            $posts = Post::paginate(15);

            return json_encode($posts);
          
    }

   

 
    public function store($request, $response)
    {
        

            $validation = $this->validator->validate($request,[

        'title' => v::notEmpty(),
        'author_id' => v::notEmpty(),
        'content' => v::notEmpty(),


            ]);






            //if tha validation is true return the message 

            if( $validation->failed())

            {
                return "field Empty";
            }



            // return "aqui devuelvo si el regitro es exitoso";

            // var_dump($request->getParams());

            Post::create([


                'title'    => $request->getParam('title'),
                'author_id'     => $request->getParam('author_id'),
                'content' => $request->getParam('content')

                ]);

            return "post Register success";



    }

  
}
