<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // $this->load->library('session');
        $this->load->library('commondb_lib');
        $this->load->library('common_snippets');
    }

    // Load View of Sign in page
    function index() {
        if ($this->session->userdata('admin_df_session') != "") {
            redirect(ADMIN . '/dashboard');
        } else {
            $this->load->view(ADMIN . '/signin');
        }
    }

    // Check User's Authentication
    function login_auth() {
        $data['email'] = $this->input->post('email');
        $data['password'] = md5($this->input->post('password'));
        $auth_data = $this->commondb_lib->find_by_field(TBL_ADMIN,'email',$data['email']);
        
        if (!empty($auth_data)) {
            if($auth_data['password'] == $data['password']){
                    if($auth_data['is_active'] == 1){
                        unset($auth_data['password']);
                        $this->session->set_userdata('admin_df_session', $auth_data);
                        redirect(ADMIN . '/dashboard');
                    }else{
                       
                        $this->session->set_flashdata('email', $data['email']);
                        $this->session->set_flashdata('message_error', 'You are a deactive user.');
                        redirect(ADMIN . '/signin');
                    }
            }else{
                $this->session->set_flashdata('email', $data['email']);
                $this->session->set_flashdata('message_error', 'Invalid Credentials');
                redirect(ADMIN . '/signin');
            }
        } else {
            $this->session->set_flashdata('message_error', 'Invalid Credentials');
            redirect(ADMIN . '/signin');
        }
    }

    // Sign Out from Panel
    function signout() {
        $this->session->unset_userdata('admin_df_session');
        //$this->session->sess_destroy();
        redirect(ADMIN . '/signin');
    }

    // for load view of change password
    function change_password(){
        if ($this->session->userdata('admin_df_session') != "") {
            $this->load->view(ADMIN . '/change_password');
        } else {
            $this->load->view(ADMIN . '/signin');
        }
    }

    // AJAX Call for check old password
    function ajax_password_check($id){
        $old_password = $this->input->get('old_password');
        
        $admin = $this->commondb_lib->find_by_field(TBL_ADMIN,'id',$id);
        if($admin['password'] === md5($old_password)){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }

    function update_change_password(){
        $data['password'] = md5($this->input->post('new_password'));
        $this->db->set($data)
                ->where('id',$this->input->post('id'))
                ->update(TBL_ADMIN);
        // die;
        redirect(ADMIN.'/signin/signout','refresh');
    }

    function find_account(){
        $this->load->view('find_account', TRUE);
    }

    function check_email(){
        $data['email'] = $this->input->post('email', TRUE);

        $auth_data = $this->commondb_lib->find_by_field(TBL_ADMIN,'email', $data['email']);
        if(!empty($auth_data)){
            if($auth_data['is_active'] == 1){
                    $this->session->set_flashdata('id', $auth_data['id']);
                    $otp = rand(1000, 9999);
                    $update_data = array('otp' => $otp);
                    $this->commondb_lib->update_record(TBL_ADMIN ,$auth_data['id'], $update_data);
                    $config = array(
                        'mobile'=> $auth_data['mobile'],
                        'message'=> 'Your OTP Verification number is: '.$otp
                    );
                    $email_data = array(
                        'to' => $auth_data['email'],
                        'from'=> "sandip885544@gmail.com",
                        "password" => "rmsjfqorhpnvptut",
                        'from_name' => 'Incidence Report',
                        'subject' => 'We have sent you otp for reset password. ',
                        'description' => "Your OTP Verification code is : ". $otp,
                        'is_gmail' => 1
                    );
                    $this->common_snippets->send_email($email_data);
                    redirect(ADMIN.'/signin/otp_verification');                
            }else{
                $this->session->set_flashdata('email', $data['email']);
                $this->session->set_flashdata('message_error', 'You are inactive.');
                redirect(ADMIN.'/signin/find_account');
            }
        }else{
            $this->session->set_flashdata('message_error', 'Account Not Found.');
            redirect(ADMIN.'/signin/find_account');
        }
    }

    function otp_verification(){
        if($this->session->flashdata('id')){
            $data['user'] = $this->commondb_lib->find_record_by_id(TBL_ADMIN,$this->session->flashdata('id')); 
            $this->load->view('otp_verification',$data, FALSE);
        }else{
            $this->session->set_flashdata('message_error', 'Do not refresh the page while you are on otp verification page.');
            redirect(ADMIN.'/signin/find_account');
        }
    }

    function ajax_check_otp($id){
        $user_data = $this->commondb_lib->find_record_by_id(TBL_ADMIN,$id);
        $otp = $this->input->get('otp', TRUE);
        if ($user_data['otp'] == $otp) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    // REsend OTP AJAX Call
    function resend_otp($id){
        $user_data = $this->commondb_lib->find_record_by_id(TBL_ADMIN,$id);

        $sms_data = array(
            'otp' => $user_data['otp'],
            'message' => "Your verification code is ".$user_data['otp'].".",
            'mobile' => $user_data['mobile'],
        );  
        $this->common_snippets->send_sms($sms_data);
        $email_data = array(
            'to' => $user_data['email'],
            'from'=> "sandip885544@gmail.com",
            'password' => "rmsjfqorhpnvptut",
            'from_name' => 'Incidence Report',
            'subject' => 'We have sent you otp for reset password. ',
            'description' => "Your OTP Verification code is : ". $user_data['otp'],
            'is_gmail' => 1
        );
        $this->common_snippets->send_email($email_data);
        echo json_encode(true);
    }

    // Change Password Load view 
    function otp_verified(){
        $this->session->set_flashdata('id', $this->input->post('id', TRUE));
        $data['user'] = $this->commondb_lib->find_record_by_id(TBL_ADMIN, $this->input->post('id')); 
        if(!empty($data['user'])){
            $this->load->view('update_forgot_password', $data, FALSE);
        }else{
            $this->session->set_flashdata('message_error', 'Something went wrong try again.');
            redirect(ADMIN.'/signin/find_account');
        }
        
    }

    function update_forgot_password(){
        $id = $this->input->post('id', TRUE);
        $data['password'] = md5($this->input->post('new_password', TRUE));
        $this->commondb_lib->update_record(TBL_ADMIN,$id, $data);
        $auth_data = $this->commondb_lib->find_record_by_id(TBL_ADMIN,$id); 
        unset($auth_data['password']);
        $this->session->set_userdata('admin_df_session', $auth_data);
        $this->session->set_userdata('user_role', $auth_data['user_role']);
        redirect(ADMIN.'/signin','refresh');
    }
}
