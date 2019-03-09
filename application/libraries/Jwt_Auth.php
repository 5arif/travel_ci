<?php

use Firebase\JWT\JWT;

defined('BASEPATH') or exit('No direct script access allowed');

class Jwt_Auth
{
    protected  $jwt_key;

    public function __construct()
	{
		$this->CI =& get_instance();
        $this->CI->load->library('form_validation');
        $this->jwt_key = $this->CI->config->item('jwt_key');
	}
    
    private function error($message = 'Unauthorized', $error_code = REST_Controller::HTTP_BAD_REQUEST){
        $this->CI->response(['message' => $message], $error_code);
    }

    public function token_check(){
        $jwt = $this->CI->input->get_request_header('Authorization');
        if (! $jwt) {
            $this->error('No Authorization Header', REST_Controller::HTTP_UNAUTHORIZED);
            return;
        }

        try {
            $decode = JWT::decode($jwt, $this->jwt_key,array('HS256'));
            return true;
        } catch (Exception $e) {
            $this->error('Invalid Authorization Token', REST_Controller::HTTP_UNAUTHORIZED);
        }
    }

    protected function is_valid_user($username, $password){
        // do validation check here
        return true;
    }

    public function request_token(){
        $username = $this->CI->input->post('username');
        $password = $this->CI->input->post('password');

        $is_valid = $this->is_valid_user($username, $password);
        if (!$is_valid) {
            $this->error('User Name or Password Invalid', REST_Controller::HTTP_UNAUTHORIZED);
        }

        $date = new DateTime();
        $payload['id'] = '12345';
        $payload['username'] = $username;
        $payload['iat'] = $date->getTimestamp(); 
        $payload['exp'] = $date->getTimestamp() + 3600; //add one hour

        $output['token'] = JWT::encode($payload, $this->jwt_key);
        return $this->CI->response($output);
    }
}