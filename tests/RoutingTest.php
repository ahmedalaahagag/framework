<?php

namespace tests;

use Core\Container;
use Core\Http\Request;
use PHPUnit\Framework\TestCase;

final class RoutingTest extends TestCase
{
    private $router;

    public function setUp()
    {
        $container = new Container();

        $this->router = $container->get('router');
    }

    /**
     * @test
     */
    public function routes()
    {
        Request::create('/users/list');

        $this->router->get('users/list', 'UserController@index');


        ob_start();
        $this->router->handle();
        $content = ob_get_contents();
        ob_end_clean();
        
        $this->assertEquals('all users', $content); 
    }

    /**
     * @test
     */
    public function routes2()
    {
        Request::create('/users/profile');

        $this->router->get('users/profile', function(){
            return 'profile';
        });


        ob_start();
        $this->router->handle();
        $content = ob_get_contents();
        ob_end_clean();
        
        $this->assertEquals('profile', $content); 
    }
}