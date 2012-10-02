<?php

namespace Demo\Test\Controller;

use Demo\Controller\PostController;

use Mockery as m;

class PostControllerTest extends \PHPUnit_Framework_Testcase
{
    public function testIndexJson() 
    {
        $repo = m::mock("Demo\Repository\PostRepository")
            ->shouldReceive("findAll")
            ->andReturn($posts = array(array("title" => "Dave")))
            ->mock();

        $controller = new PostController($repo);
        $this->assertInstanceOf("Symfony\Component\HttpFoundation\JsonResponse", $controller->indexJson());
    }
}
