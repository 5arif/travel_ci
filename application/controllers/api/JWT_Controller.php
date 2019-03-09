<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JWT_Controller extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('jwt_auth');
    }

    public function index_post(){
        $this->jwt_auth->request_token();
    }

    public function check_post(){
        $this->jwt_auth->request_token();
    }
}