<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JwtMiddleware implements Luthier\MiddlewareInterface
{

    /**
     * Middleware entry point
     *
     * @return void
     */
    public function run($args = [])
    {
        ci()->load->library('jwt_auth');
        ci()->jwt_auth->token_check();
    }
}