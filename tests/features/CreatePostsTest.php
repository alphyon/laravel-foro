<?php

/**
 * Description of CreatePostsTest
 *
 * @author alphyon
 */
class CreatePostsTest extends FeatureTestCase
{

    public function test_a_user_create_post() {
        /** Having */
        /** elemento de preuba para validar que se crea el registro */
        $this->actingAs($user = $this->defaultUser());

        /** When */
        $this->visit(route('posts.create'))
                ->type('esta es una pregunta', 'title')
                ->type('este es el contenido', 'content')
                ->press('Publicar');


        /** Then */
        /** elemento para validar en base de datos que ete guardado
         * el registro */
        $this->seeInDatabase('posts', [
            'title' => 'esta es una pregunta',
            'content' => 'este es el contenido',
            'pending' => true,
            'user_id' => $user->id,
        ]);

        /*         * validar que se redireccione el usuario despues de crear el registro */

        $this->see('esta es una pregunta');
    }

    public function test_creating_a_post_requires_autenticate() {

        $this->visit(route('posts.create'))
                ->seePageIs(route('login'));


    }

}
