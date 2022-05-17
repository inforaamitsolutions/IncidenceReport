<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_Subscribe extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('commondb_lib');
	}

	public function index()
	{
		// $data['users_subscribe'] = $this->db->get(TBL_USER_SUBSCRIBE)->result_array();        
		$data['all_subscribers'] = $this->db
			->select('user.name as user_name, user.email as user_email, user.mobile as user_mobile')
			->select('tbl_subscription_plan.title as plan_title, tbl_subscription_plan.description as description')
			->select('tbl_user_subscribe.*')
			->from(TBL_SUBSCRIPTION_PLAN . ' as tbl_subscription_plan')
			->from(TBL_USER . ' as user')
			->from(TBL_USER_SUBSCRIBE . ' as tbl_user_subscribe')
			->where('tbl_user_subscribe.user_id = user.id')
			->where('tbl_user_subscribe.plan_id = tbl_subscription_plan.id')
			->get()
			->result_array();
			
		$this->load->view(ADMIN . '/users_subscribe', $data, FALSE);
	}


	public function update_code()
	{
		$id = $this->input->post('id', TRUE);
		$data['subscription_title'] = $this->input->post('subscription_title', TRUE);
		$data['subscription_year_description'] = $this->input->post('subscription_year_description', TRUE);
		$data['subscription_year'] = $this->input->post('subscription_year', TRUE);
		$data['subscription_year_price'] = $this->input->post('subscription_year_price', TRUE);
		$data['subscription_month'] = $this->input->post('subscription_month', TRUE);
		$data['subscription_month_price'] = $this->input->post('subscription_month_price', TRUE);
		$data['subscription_month_description'] = $this->input->post('subscription_month_description', TRUE);
		$data['sp_3_description'] = $this->input->post('sp_3_description', TRUE);
		$data['sp_3_month'] = $this->input->post('sp_3_month', TRUE);
		$data['sp_3_price'] = $this->input->post('sp_3_price', TRUE);
		/*$data['sp_4_description'] = $this->input->post('sp_4_description', TRUE);
		$data['sp_4_month'] = $this->input->post('sp_4_month', TRUE);
		$data['sp_4_price'] = $this->input->post('sp_4_price', TRUE);*/
		$this->commondb_lib->update_record(TBL_USER_SUBSCRIBE, $id, $data);
		redirect(ADMIN . '/subscription', 'refresh');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */