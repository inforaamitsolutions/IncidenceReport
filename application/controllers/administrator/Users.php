<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*require(APPPATH . '/libraries/datatables/autoload.php');

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\CodeigniterAdapter;*/

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('commondb_lib');
	}

	// Load View Of Users
	public function index(){
		$fields_data = array('is_active'=>1);
		$data['users_list'] = $this->commondb_lib->get_records_by_multiple_fields(TBL_USER, $fields_data);
		$this->load->view(ADMIN.'/users_list', $data, FALSE);
	}

	// Users detail 
	function user_detail($user_id){
		$data['user'] =  $this->commondb_lib->find_record_by_id(TBL_USER, $user_id);
        $data['incidence'] =  $this->commondb_lib->get_records_by_multiple_fields(TBL_INCIDENCE, $user_id);
        // echo "<pre>";
        // print_r($data['incidence']);
        // echo "</pre>";
        // die;
		$this->load->view(ADMIN.'/user_detail', $data, FALSE);
	}

	function remove_user($user_id){
		$this->commondb_lib->remove_record(TBL_USER,$user_id,false);
		redirect(ADMIN.'/users/','refresh');
	}

	// Pending Users
	function pending_users(){
		$data['users_list'] = $this->db
							->select('*')
							->from(TBL_USER)
							->where('user_role', 2)
							->where('is_otp_verify = 0 OR is_active = 0')
							->get()
							->result_array();
		$this->load->view(ADMIN.'/users_pending_list', $data, FALSE);
	}

	
}

/* End of file  */
/* Location: ./application/controllers/ */