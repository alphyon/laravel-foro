<?php

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

/**Creamos un usuario pro defecto para hacer validadciones cuando sea necesario 
 * que este presenta en alguna prueba
 */
    public function defaultUser()
    {
        if($this->defaultUser){
            return $this->defaultUser;
        }
        return $this->defaultUser = factory(\App\User::class)->create();
    }
}
