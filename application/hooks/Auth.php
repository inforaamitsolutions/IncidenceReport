<?php

class Auth {

    protected $CI;

    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->output->set_header('HTTP/1.0 200 OK');
        $this->CI->output->set_header('HTTP/1.1 200 OK');
        // $this->CI->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_update).' GMT');
        $this->CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->CI->output->set_header('Cache-Control: post-check=0, pre-check=0');
        $this->CI->output->set_header('Pragma: no-cache');
    }

    public function auth_check() {
        $current_route = $this->CI->uri->segment(1);
        $current_route_2 = $this->CI->uri->segment(2);
        if ($current_route == ADMIN) {
            if ($current_route != ADMIN || $current_route_2 != "signin") {
                if (!$this->CI->session->userdata('admin_df_session')) {
                    redirect(ADMIN . '/signin');
                }
            }
        }
    }

    

}
