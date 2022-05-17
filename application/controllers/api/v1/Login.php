<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');

class Login extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('apiauth_helper');
        $this->load->library(array('commondb_lib','common_snippets'));
        $this->load->model('users_model','Users_model');
    }

    public function index_post() {
        $input = file_get_contents("php://input");
	    $_POST = $input_array = json_decode($input, true);
        // Make Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email' , 'email', 'required');
        $this->form_validation->set_rules('password' , 'password', 'required');
        $this->form_validation->set_rules('fcm_token' , 'fcm_token', 'required');        
        if ($this->form_validation->run() == FALSE){
            $this->response([
                'status' => '0',
                'message' => "Validation Error",
                'error' => $this->form_validation->error_array(),
            ]);
        }        
        $check_email = $this->commondb_lib->find_by_field(TBL_USER,'email',$input_array['email']);         
        if(empty($check_email) || $check_email['is_active'] == 0){
            $this->response([
                'status' => '0',
                'message' => "Validation Error",
                'error' => [
                    'email' => 'User is unavailable'
                ],
            ]);
        }
        
        $object = new ImplementJWT();
        $jwttoken = $object->GenerateToken($check_email);
        if($check_email['password'] == md5($input_array['password'])){
            $update_data = array('fcm_token'=>$input_array['fcm_token']);
            $api_data = $this->Users_model->get_api_user_data_by_id($check_email['id']);
            $this->commondb_lib->update_record(TBL_USER,$check_email['id'],$update_data);
            $details = array_merge(array('status' => "1", 'message' => "Welcome ". $check_email['name'] .", to Incidence Report."),$api_data,array('token'=>$jwttoken));
            $this->response($details);            
        }else{
            $details = array('status' => "0", 'message' => "Invalid Credentials.");
            $this->response([
                'status' => '0',
                'message' => "Invalid Credentials",
            ]);
        }
    }

    public function test_get(){
        $user = token_check();
        print_r($user);
    }

    public function registration_post(){
        $this->load->helper('user_validation_helper');

        $input = file_get_contents("php://input");
	    $_POST = $input_array = json_decode($input, true);

        // Make Validation using helper        
        registerFormValidation();        
        uniqueEmailValidation($input_array['email']);
        uniqueMobileValidation($input_array['mobile']);

        $data = array(
            'name' => $input_array['name'],
            'email' => $input_array['email'],
            'mobile' => substr($input_array['mobile'],-10),
            'password' => md5($input_array['password']),
            'fcm_token' => $input_array['fcm_token'],
            'is_active' =>1,
            'is_otp_verify' => 0,
            'otp' => rand(1000,9999),//rand(1000,9999),
            'created_at' => date("Y-m-d h:i:s")
        );                        
        $id = $this->commondb_lib->insert_record(TBL_USER, $data);
        $user_data = $this->commondb_lib->find_by_field(TBL_USER, 'id', $id);
        $object = new ImplementJWT();
        $jwttoken = $object->GenerateToken($user_data);

        $sms_data = array(
            'otp' => $data['otp'],
            'message' => "Your verification code is ".$data['otp'].".",
            'mobile' => $data['mobile'],
        );  
        // $this->common_snippets->send_sms($sms_data);
        $details = array_merge(array('status' => "1", 'message' => "Please Verify Your Otp!."),$user_data,array('token'=>$jwttoken));
        $this->response($details); 
        
    }

    public function otp_Verification_post(){
        $this->load->helper('user_validation_helper');
        $input = file_get_contents("php://input");
	    $_POST = $input_array = json_decode($input, true);

        $user = normal_token_check();
        // Make Validation using helper 
        uniqueOtpValidation($user['id']);        
        
        $check_otp = $this->commondb_lib->find_by_field(TBL_USER,'id',$user['id']);         
        if($check_otp['otp'] != $input_array['otp']){
            $this->response([
                'status' => '0',
                'message' => "Invalid Otp Please Try Again",
                'error' => [
                    'otp' => 'Invalid Otp Please Try Again'
                ],
            ]);
        }
        if($check_otp['is_otp_verify'] == true ){
            $this->response([
                'status' => '0',
                'message' => "Validation Error",
                'error' => [
                'otp' => 'Invalid Otp Please Try Again'
                ],
            ]);
        }       
        $object = new ImplementJWT();
        $jwttoken = $object->GenerateToken($check_otp);
       
        if($check_otp['otp'] == $input_array['otp']){
            $update_data = array(
                'fcm_token'=>$jwttoken,
                'is_active' =>1,
                    'is_otp_verify' => 1
            );
            $user_data = $this->Users_model->getUserById($check_otp['id']);
            $this->commondb_lib->update_record(TBL_USER,$check_otp['id'],$update_data);
            $details = array_merge(array('status' => "1", 'message' => "Dear ". $check_otp['name'] .",You Are Successfully Registerd."),$user_data,array('token'=>$jwttoken));
            $this->response($details);            
        }else{
            $details = array('status' => "0", 'message' => "Invalid Otp.");
            $this->response([
                'status' => '0',
                'message' => "Invalid Otp",
            ]);
        }
    }
}