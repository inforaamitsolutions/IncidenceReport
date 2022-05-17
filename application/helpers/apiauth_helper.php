<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require(APPPATH . 'libraries/ImplementJWT.php');

/*
NOTE: Main Token Generation
*/
if (!function_exists('token_check')) {
    function token_check() {     
        $CI = &get_instance();   
        $CI->load->library('commondb_lib');
        $bjofJwt = new ImplementJWT();
        $recieved_token = $CI->input->request_headers();
        try {
            if (isset($recieved_token['Authorization'])) {
                $current_api_nav = $CI->uri->segment(2);
                $jwtdata = $bjofJwt->DecodeToken($recieved_token['Authorization']);
                $check_email = $CI->commondb_lib->find_by_field(TBL_USER,'email',$jwtdata['email']);
                if(!empty($check_email)){
                    if($check_email['password'] == $jwtdata['password']){
                        $details = $check_email;
                        // if($check_email['is_otp_verify'] == true){
                        //     if($check_email['is_active'] == true){
                        //         $details = $check_email;
                        //             return $details;
                        //     }else{
                        //         $details = array('status' => "3", 'message' => "You are a deactive user. Please contact administrator.");
                        //         $CI->response($details);
                        //     }
                        // }else{
                        //     $object = new ImplementJWT();
                        //     $jwttoken = $object->GenerateToken($check_email);
                        //     $details = array('status' => "2", 'message' => "Your OTP Verification is pending. Please proceed to OTP verification.",'token'=>$jwttoken);
                        //     $CI->response($details);
                        // }
                    }else{
                        $details = array('status' => "0", 'message' => "Invalid Credentials.");
                        $CI->response($details);
                    }
                }else{
                    $details = array('status' => "0", 'message' => "Invalid Credentials.");
                    $CI->response($details);
                }
                
            } else {
                $msg = array('status' => '0', 'message' => 'Please Enter Authorization Token.');
                $CI->response($msg);
            }
        } catch (Exception $e) {
            $msg = array('status' => '0', 'message' => 'ERROR in Token Generation.');
            $CI->response($msg);
        }
    }
}

/*
* Token : When Change password when token going to be miss match then this will called.
*/
if (!function_exists('normal_token_check')) {
    function normal_token_check() {  
        $CI = &get_instance();      
        $CI->load->library('commondb_lib');
        $bjofJwt = new ImplementJWT();
        $recieved_token = $CI->input->request_headers();
        try {
            if (isset($recieved_token['Authorization'])) {
                $current_api_nav = $CI->uri->segment(2);
                $jwtdata = $bjofJwt->DecodeToken($recieved_token['Authorization']);
                return $jwtdata;
            } else {
                $msg = array('status' => '0', 'message' => 'Please Enter Authorization Token.');
                $CI->response($msg);
            }
        } catch (Exception $e) {
            $msg = array('status' => '0', 'message' => 'ERROR in Token Generation.');
            $CI->response($msg);
        }
    }
}
