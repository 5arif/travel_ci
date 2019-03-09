<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MitraController extends REST_Controller
{
    /**
     * Index action
     */
    public function index_get()
    {
        $mitra =
        [
            ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
            ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com', 'fact' => 'Developed on CodeIgniter'],
            ['id' => 3, 'name' => 'Jane', 'email' => 'jane@example.com', 'fact' => 'Lives in the USA', ['hobbies' => ['guitar', 'cycling']]],
        ];

        $this->set_response($mitra, REST_Controller::HTTP_UNAUTHORIZED);
    }
}