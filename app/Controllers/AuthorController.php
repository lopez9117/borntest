<?php

namespace App\Controllers;


use Illuminate\Pagination\Paginator;
use Slim\Views\Twig as View;
use App\Models\Author;
use Respect\Validation\Validator as v;

class AuthorController extends Controller
{
    
    public function index()
    {
        
            $autors = Author::paginate(10);

            return json_encode($autors);
          
    }

   
  


 
    public function store($request, $response)
    {
        

            $validation = $this->validator->validate($request,[

        'firstname' => v::notEmpty(),
        'lastname' => v::notEmpty()
      


            ]);






            //if tha validation is true return the message 

            if( $validation->failed())

            {
                return "field Empty";
            }



            // return "aqui devuelvo si el regitro es exitoso";

            // var_dump($request->getParams());

            Author::create([


                'firstname'    => $request->getParam('firstname'),
                'lastname'     => $request->getParam('lastname')
                ]);

            return "Author Register success";



    }

  
}
