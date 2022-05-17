<?php
ini_set('memory_limit', '1024M');
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('commondb_lib');
    }

    public function index()
    {
        $fields_data = array('is_active' => 1);
        $data['all_user'] = $this->commondb_lib->get_records_by_multiple_fields(TBL_USER, $fields_data);
        $data['all_subscribers'] = $this->commondb_lib->get_records_by_multiple_fields(TBL_USER_SUBSCRIBE, $fields_data);
        $data['all_subscription_plan'] = $this->commondb_lib->get_records_by_multiple_fields(TBL_SUBSCRIPTION_PLAN, $fields_data);
        $data['all_incidence'] = $this->commondb_lib->get_records_by_multiple_fields(TBL_INCIDENCE, $fields_data);
        // $data['all_subscribers'] = $this->db
        // 									->select('user.name as user_name, user.email as user_email, user.mobile as user_mobile')
        // 									->select('tbl_subscription_plan.title as plan_title, tbl_subscription_plan.description as description')
        // 									->select('tbl_user_subscribe.*')
        // 									->from(TBL_SUBSCRIPTION_PLAN.' as tbl_subscription_plan')
        // 									->from(TBL_USER.' as user')
        // 									->from(TBL_USER_SUBSCRIBE.' as tbl_user_subscribe')
        // 									->where('tbl_user_subscribe.user_id = user.id')
        // 									->where('tbl_user_subscribe.plan_id = tbl_subscription_plan.id')
        // 									->get()
        // 									->result_array();    
        $this->load->view(ADMIN . '/dashboard', $data, FALSE);
    }

    function add_admin_users()
    {
        $data = array(
            'name' => $this->input->post('name', TRUE),
            'email' => $this->input->post('email', TRUE),
            'password' => md5($this->input->post('password', TRUE)),
            'mobile' => $this->input->post('mobile', TRUE),
            'is_active' => 1,
            'otp' => rand(1000, 9999), //rand(1000,9999),           
            'created_at' => date("Y-m-d h:i:s")
        );
        $id = $this->commondb_lib->insert_record(TBL_USER, $data);
        redirect(ADMIN . '/dashboard', 'refresh');
    }



    // Remove Users
    function remove_user($user_id)
    {
        $this->commondb_lib->remove_record(TBL_USER, $user_id, false);
        redirect(ADMIN . '/dashboard/', 'refresh');
    }
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */