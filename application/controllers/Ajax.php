<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('commondb_lib');
	}

	// Active Deactive Users
	function active_deactive_user(){
		$user_id = $this->input->post('id', TRUE);
		$user_data = $this->commondb_lib->find_record_by_id(TBL_USER, $user_id);
		if($user_data['is_active'] == 1){
			$update_data = array('is_active'=>0);
		}else{
			$update_data = array('is_active'=>1);
		}
		$this->commondb_lib->update_record(TBL_USER, $user_id, $update_data);
		echo json_encode(true);
	}

	
	// Active Deactive Subscription
	function active_deactive_subscription(){
		$user_id = $this->input->post('id', TRUE);
		$user_data = $this->commondb_lib->find_record_by_id(TBL_SUBSCRIPTION_PLAN, $user_id);
		if($user_data['status'] == 1){
			$update_data = array('status'=>0);
		}else{
			$update_data = array('status'=>1);
		}
		$this->commondb_lib->update_record(TBL_SUBSCRIPTION_PLAN, $user_id, $update_data);
		echo json_encode(true);
	}

	

	

	function reg_email_check(){
		$email = $this->input->get('email');
        $check_email = $this->commondb_lib->find_by_field(TBL_USER,'email',$email);
        if (!empty($check_email)) {
            echo json_encode(false);
        } else {
            echo json_encode(true);
        }
	}

	

	

}

/* End of file  */
/* Location: ./application/controllers/ */