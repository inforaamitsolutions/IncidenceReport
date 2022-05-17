<?php 
// require(APPPATH . '/libraries/REST_Controller.php');

    if (!function_exists('registerFormValidation')) {

        function registerFormValidation() { 
            $CI = &get_instance();   
            $CI->load->library('form_validation');            
            $CI->form_validation->set_rules('name' , 'name', 'required');
            $CI->form_validation->set_rules('email' , 'email', 'required');
            $CI->form_validation->set_rules('mobile' , 'mobile', 'required');
            $CI->form_validation->set_rules('password' , 'password', 'trim|required|min_length[6]|max_length[25]');
            $CI->form_validation->set_rules('fcm_token' , 'fcm_token', 'required');
            if ($CI->form_validation->run() == FALSE){
                
                echo json_encode([
                    'status' => '0',
                    'message' => "Validation Error",
                    'error' => $CI->form_validation->error_array(),
                ]);
                // set_status_header(403);
                exit;
                
            }  
        }

    }

    if(!function_exists('uniqueEmailValidation')){

        function uniqueEmailValidation($email){
            $CI = &get_instance();   
            $CI->load->library('commondb_lib');            
            $check_email =  $CI->commondb_lib->find_by_field(TBL_USER,'email',$email);
            if(!empty($check_email)){
                if($check_email['is_otp_verify'] == false){
                    $object = new ImplementJWT();
                    $jwttoken = $object->GenerateToken($check_email);
                    echo json_encode([
                        'status' => '1',
                        'message' => "Dear ".$check_email['name'].", your OTP verification is pending. Please verify your account with OTP.", 
                        'token'=>$jwttoken
                    ]);
                    exit;            
                }  
                echo json_encode([
                    'status' => '0',
                    'message' => "Email Already Exists!",
                    'error' => [
                        'email' => "Email Already Exists!",
                    ]
                ]);
                exit;            
            }
        }   

    }

    if(!function_exists('uniqueMobileValidation')){     

        function uniqueMobileValidation($mobile){
            $CI = &get_instance();   
            $CI->load->library('commondb_lib');
            $check_mobile = $CI->commondb_lib->find_by_field(TBL_USER,'mobile',$mobile);        
            if(!empty($check_mobile)){
                echo json_encode([
                    'status' => '0',
                    'message' =>  "Mobile Number Already Exists!",
                    'error' =>[
                        'mobile' => "Mobile Number Already Exists!",
                    ]
                ]);
                exit;
            }
        }
    }

    if(!function_exists('uniqueOtpValidation')){     

        function uniqueOtpValidation($id){
            $CI = &get_instance();   
            $CI->load->library('form_validation');            
            $CI->form_validation->set_rules('otp' , 'otp', 'required');
            if ($CI->form_validation->run() == FALSE){
                
                echo json_encode([
                    'status' => '0',
                    'message' => "Validation Error",
                    'error' => $CI->form_validation->error_array(),
                ]);
                // set_status_header(403);
                exit;
                
            }  
          
        }
    }
