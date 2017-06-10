<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        
        $user = factory(\App\User::class)->create([
            'name' => 'Jose Chavarria', //dato que se debe validar 
            'email' => 'alphyon21@gmail.com', //dato que se debe validar 
        ]);
        $this->actingAs($user, 'api') //simular un usuario autenticado 
             ->visit('api/user')
             ->see('Jose Chavarria')
             ->see('alphyon21@gmail.com');
    }
}
