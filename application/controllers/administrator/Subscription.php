<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscription extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('commondb_lib');
	}

	public function index()
	{
		$data['subsscription'] = $this->db->get(TBL_SUBSCRIPTION_PLAN)->result_array();
		$this->load->view(ADMIN . '/subscription', $data, FALSE);
	}

	public function create()
	{
		$this->load->view(ADMIN . '/add_subscription');
	}

	// Add Blogs Code
	function add_subscription()
	{
		$data['title']		 = $this->input->post('title', TRUE);
		$data['price']		 = $this->input->post('price', TRUE);
		$data['days_count']  = $this->input->post('days_count', TRUE);
		$data['description'] = $this->input->post('description', TRUE);
		$data['status'] 	 = $this->input->post('status', TRUE);

		if ($this->input->post('status', TRUE))
			$data['status'] = 1;
		else
			$data['status'] = 0;
		$data['created_at'] = date('Y-m-d h:i:s');
		$insert = $this->commondb_lib->insert_record(TBL_SUBSCRIPTION_PLAN, $data);
		if (!empty($insert))
			$this->session->set_flashdata('message_success', 'You have added new subscription plan ' . $data['title'] . '. ');
		else
			$this->session->set_flashdata('message_error', 'You have error occur in add new subscription plan ' . $data['title'] . '. ');
		redirect(ADMIN . '/subscription', 'refresh');
	}

	public function edit($id)
	{
		$data['subscription'] = $this->commondb_lib->find_record_by_id(TBL_SUBSCRIPTION_PLAN, $id);

		$this->load->view(ADMIN . '/edit_subscription', $data, FALSE);
	}

	public function update_subscription()
	{
		$id = $this->input->post('id', TRUE);
		$data['title']       = $this->input->post('title', TRUE);
		$data['price'] 		 = $this->input->post('price', TRUE);
		$data['days_count']  = $this->input->post('days_count', TRUE);
		$data['description'] = $this->input->post('description', TRUE);
		$data['status'] 	 = $this->input->post('status', TRUE);
		if ($this->input->post('status', TRUE))
			$data['status'] = 1;
		else
			$data['status'] = 0;
		$update = $this->commondb_lib->update_record(TBL_SUBSCRIPTION_PLAN, $id, $data);
		if (!empty($update))
			$this->session->set_flashdata('message_success', 'You have update subscription plan ' . $data['title'] . '. ');
		else
			$this->session->set_flashdata('message_error', 'You have error occur in update subscription plan ' . $data['title'] . '. ');
		redirect(ADMIN . '/subscription', 'refresh');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */