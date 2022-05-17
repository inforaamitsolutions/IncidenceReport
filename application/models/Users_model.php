<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	// Get Users data for API
	function get_api_user_data_by_id($user_id){
		$res = $this->db
			->select('id,name,email,mobile,fcm_token')
			->from(TBL_USER)
			->where('id',$user_id)
			->get()
			->row_array();	
		return $res;
	}

	function getUserById($user_id){
		$res = $this->db
			->select('id,name,email,mobile')
			->from(TBL_USER)
			->where('id',$user_id)
			->get()
			->row_array();	
		return $res;
	}

}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */