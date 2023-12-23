<?php 
namespace Test\Framework;

use Framework\App;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class AppTest extends TestCase {

    public function testRedirectTrailingSlash(){
        //on teste si url se termine '/' comme on a defini dans app
        $app =  new App();

        $request = new ServerRequest('GET', '/demoslash/');
        $response = $app->run($request);
        

        $this->assertContains('/demoslash', $response->getHeader('Location'));
        $this->assertEquals(301, $response->getStatusCode());

    }

    public function testBlog(){

        $app = new App();
        $request = new ServerRequest('GET', '/blog');
        $response = $app->run($request);

        $this->assertStringContainsString('<h1>Bienvenue sur le blog</h1>', (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testError404(){

        $app = new App();
        $request = new ServerRequest('GET', '/chemin-inexistant');
        $response = $app->run($request);

        $this->assertStringContainsString('<h1>Erreur 404 !</h1>', (string)$response->getBody());
        $this->assertEquals(404, $response->getStatusCode());
    }


}