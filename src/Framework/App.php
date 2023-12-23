<?php 
 
    namespace Framework;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


    class App {

        public function run(ServerRequestInterface $request):ResponseInterface {
          
            //Le code app est celui dont les test use 
            //Les tests mise en place a la struture de l'app
            //pour faire des test unitaire il faut creer Une ClasseMere qui est sera appeler par notre ClasseMereTest
            #
            $uri = $request->getUri()->getPath();

                if (!empty($uri) && $uri[-1] === "/") {
                    $response = (new Response())
                        ->withStatus(301)
                        ->withHeader('Location',substr($uri,0,-1));
                     
                    return $response;
                }
                if ($uri === '/blog') {
                    return new Response(200 , [], '<h1>Bienvenue sur le blog</h1>');
                }

            
            $response  = new Response(404, [],'<h1>Erreur 404 !</h1>');
                return $response;
        }


    }