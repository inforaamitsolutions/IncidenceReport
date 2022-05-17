<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Media extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('common_snippets');
    }

    // Load view of Media Upload
    public function index()
    {
        $this->load->helper('directory');
        $images = directory_map('assets/uploads/media_images/');
        if (!empty($images)) {
            $data['media_images'] = array_reverse($images, true);
        } else {
            $data['media_images'] = array();
        }
        $this->load->view(ADMIN . '/media_images_list', $data, FALSE);
    }

    // Image
    function image_upload()
    {
        $images = $this->common_snippets->upload_image("media_images", "media_image");
        $details = "";
        if (is_array($images)) {
            $this->session->set_flashdata('message_error', 'Something went wrong.');
        } else {
            $this->session->set_flashdata('message_success', 'Image is uploaded.');
        }
        redirect(ADMIN . '/media', 'refresh');
    }

    // Remove Media images
    function remove_image()
    {
        $image = $this->input->post('image', TRUE);
        $removed_image = unlink('assets/uploads/media_images/' . $image);
        if ($removed_image) {
            $details = array('status' => 1, 'message' => 'You removed image');
        } else {
            $details = array('status' => 0, 'message' => 'Something went wrong.');
        }
        echo json_encode($details);
    }

    public function from_ck_upload()
    {
        $images = $this->common_snippets->upload_image("media_images", "upload");
        $file_path = base_url() . 'assets/uploads/media_images/' . $images;
        $function_number = $_GET['CKEditorFuncNum'];
        $message = "";
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$file_path', '$message')</script>";
    }
}
