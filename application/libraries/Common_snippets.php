<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// require APPPATH.'libraries/ApnsPHP/Autoload.php';

class Common_snippets {

    protected $ci;

    public function __construct() {
        $this->ci = & get_instance();
    }

    // Upload Image At Particular Location
    public function upload_image($folder_name, $file_name) {
        $config['upload_path'] = 'assets/uploads/' . $folder_name;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|icon|image|image/ico';
        // $config['max_size'] = 5048;
        $config['overwrite'] = FALSE;
        $config['file_name'] = time();
        $file_ext = pathinfo($_FILES[$file_name]["name"], PATHINFO_EXTENSION);
        // For Automatically Create Directory if not exist
        if (!is_dir($config['upload_path'])) {
            mkdir('assets/uploads/' . $folder_name, 0744, TRUE);
        } 
        $this->ci->load->library('upload', $config);
        if (!$this->ci->upload->do_upload($file_name)) {
            $error = array('error' => $this->ci->upload->display_errors());
            return $error;
        } else {
            $image_data = $this->ci->upload->data();
            $image_name = $image_data['file_name'];
            return $image_name;
        }
    }

    // Is Multi Upload then 
    function multi_upload_image($folder_name, $file_name){
        $filesCount = count($_FILES[$file_name]['name']);
        $images_names = array();
        for($i = 0; $i < $filesCount; $i++){
            if(!empty($_FILES[$file_name]['name'][$i])){
                $_FILES['file']['name']= $_FILES[$file_name]['name'][$i];
                $_FILES['file']['type']= $_FILES[$file_name]['type'][$i];
                $_FILES['file']['tmp_name']= $_FILES[$file_name]['tmp_name'][$i];
                $_FILES['file']['error']= $_FILES[$file_name]['error'][$i];
                $_FILES['file']['size']= $_FILES[$file_name]['size'][$i];  

                $config['upload_path'] = 'assets/uploads/' . $folder_name;  
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                // $config['overwrite'] = FALSE;
                $config['file_name'] = time().rand();
                if (!is_dir($config['upload_path'])) {
                    mkdir('assets/uploads/' . $folder_name, 0777, TRUE);
                }
                $this->ci->load->library('upload',$config);
                $this->ci->upload->initialize($config);
                $V = $this->ci->upload->do_upload('file');
                $fileData = $this->ci->upload->data();
                if($this->ci->upload->display_errors()){
                    $images_names[] = "";        
                }else{
                    $images_names[] = $fileData['file_name'];
                }
            }else{
                $images_names[] = "";    
            }
        }
        return $images_names;
    }

    // Is Multi Upload then 
    function multi_upload_audio($folder_name, $file_name){
        $filesCount = count($_FILES[$file_name]['name']);
        $images_names = array();
        for($i = 0; $i < $filesCount; $i++){
            if(!empty($_FILES[$file_name]['name'][$i])){
                $_FILES['file']['name']= $_FILES[$file_name]['name'][$i];
                $_FILES['file']['type']= $_FILES[$file_name]['type'][$i];
                $_FILES['file']['tmp_name']= $_FILES[$file_name]['tmp_name'][$i];
                $_FILES['file']['error']= $_FILES[$file_name]['error'][$i];
                $_FILES['file']['size']= $_FILES[$file_name]['size'][$i];  

                $config['upload_path'] = 'assets/uploads/' . $folder_name;  
                $config['allowed_types'] = '*';
                // $config['overwrite'] = FALSE;
                $config['file_name'] = time().rand();
                if (!is_dir($config['upload_path'])) {
                    mkdir('assets/uploads/' . $folder_name, 0777, TRUE);
                }
                $this->ci->load->library('upload',$config);
                $this->ci->upload->initialize($config);
                $V = $this->ci->upload->do_upload('file');
                $fileData = $this->ci->upload->data();
                if($this->ci->upload->display_errors()){
                    $images_names[] = "";        
                }else{
                    $images_names[] = $fileData['file_name'];
                }
            }else{
                $images_names[] = "";    
            }
        }
        return $images_names;
    }

    // Is Multi Upload then 
    function multi_upload_video($folder_name, $file_name){
        $filesCount = count($_FILES[$file_name]['name']);
        $images_names = array();
        for($i = 0; $i < $filesCount; $i++){
            if(!empty($_FILES[$file_name]['name'][$i])){
                $_FILES['file']['name']= $_FILES[$file_name]['name'][$i];
                $_FILES['file']['type']= $_FILES[$file_name]['type'][$i];
                $_FILES['file']['tmp_name']= $_FILES[$file_name]['tmp_name'][$i];
                $_FILES['file']['error']= $_FILES[$file_name]['error'][$i];
                $_FILES['file']['size']= $_FILES[$file_name]['size'][$i];  

                $config['upload_path'] = 'assets/uploads/' . $folder_name;  
                $config['allowed_types'] = '*';
                // $config['overwrite'] = FALSE;
                $config['file_name'] = time().rand();
                if (!is_dir($config['upload_path'])) {
                    mkdir('assets/uploads/' . $folder_name, 0777, TRUE);
                }
                $this->ci->load->library('upload',$config);
                $this->ci->upload->initialize($config);
                $V = $this->ci->upload->do_upload('file');
                $fileData = $this->ci->upload->data();
                if($this->ci->upload->display_errors()){
                    $images_names[] = "";        
                }else{
                    $images_names[] = $fileData['file_name'];
                }
            }else{
                $images_names[] = "";    
            }
        }
        return $images_names;
    }

    // Audio Upload
    public function audio_upload_file($folder_name, $file_name) {
        $config['upload_path'] = 'assets/uploads/' . $folder_name;
        $config['allowed_types'] = '*';
        // $config['max_size'] = 5048;
        $config['overwrite'] = FALSE;
        $config['file_name'] = time();
        $file_ext = pathinfo($_FILES[$file_name]["name"], PATHINFO_EXTENSION);
        // For Automatically Create Directory if not exist
        if (!is_dir($config['upload_path'])) {
            mkdir('assets/uploads/' . $folder_name, 0777, TRUE);
        } 
        $this->ci->load->library('upload', $config);
        $this->ci->upload->initialize($config);
        if (!$this->ci->upload->do_upload($file_name)) {
            $error = array('error' => $this->ci->upload->display_errors());
            return $error;
        } else {
            $image_data = $this->ci->upload->data();
            $image_name = $image_data['file_name'];
            return $image_name;
        }
    }

    // Video Upload
    public function video_upload_file($folder_name, $file_name) {
        $config['upload_path'] = 'assets/uploads/' . $folder_name;
        $config['allowed_types'] = '*';
        // $config['max_size'] = 5048;
        $config['overwrite'] = FALSE;
        $config['file_name'] = time();
        $file_ext = pathinfo($_FILES[$file_name]["name"], PATHINFO_EXTENSION);
        // For Automatically Create Directory if not exist
        if (!is_dir($config['upload_path'])) {
            mkdir('assets/uploads/' . $folder_name, 0777, TRUE);
        } 
        $this->ci->load->library('upload', $config);
        $this->ci->upload->initialize($config);
        if (!$this->ci->upload->do_upload($file_name)) {
            $error = array('error' => $this->ci->upload->display_errors());
            return $error;
        } else {
            $image_data = $this->ci->upload->data();
            $image_name = $image_data['file_name'];
            return $image_name;
        }
    }

    // Send Email Functionality
    /*
     * NOTE: If is_gemail == 1 then it will send from GMAIL Configuration 
     * otherwise it will send from Server configuration
     */
    /*$email_parameters = array(
        'to' => $to,
        'from'=>$from,
        'password' => $password
        'from_name' => $from_name,
        'cc' => $cc,
        'subject' => $subject,
        'description' => $description,
        'is_gmail' => $is_gmail
    );*/
    public function send_email($email_parameters) {
        $email_config = array();
        $this->ci->load->library('email');
        if ($email_parameters['is_gmail'] == 1) {

            $email_config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_port' => 587, // server gmail : 465 or local : 25 or server protocol : 587
                'smtp_user' => $email_parameters['from'],
                'smtp_pass' => $email_parameters['password'],
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'smtp_crypto' => 'tls',
            );
            // $email_config['smtp_host'] = 'mail.gmail.com';
            // $email_config['smtp_port'] = '587';
            // $email_config['smtp_user'] = $email_parameters['from'];
            // $email_config['smtp_pass'] = $email_parameters['password'];
            // $email_config['smtp_crypto'] = 'tls'; //FIXED
            // $email_config['protocol'] = 'smtp'; //FIXED
            // $email_config['mailtype'] = 'html'; //FIXED
            // $email_config['send_multipart'] = FALSE;
            
            // $email_config['protocol'] = 'sendmail';
            // $email_config['mailtype'] = 'html';
            // $email_config['charset']  = 'utf-8';
            // $email_config['newline']  = "\r\n";
        }else{
            /*$email_config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'mail.codeclinic.in',
                'smtp_port' => 587,
            // 'smtp_timeout' => '7', 
                'smtp_user' => $email_parameters['from'],
                'smtp_pass' => $email_parameters['password'],
                'mailtype' => 'html',
                'charset'   => 'utf-8',
                'smtp_crypto' => 'tls',

            );*/
            $email_config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.zoho.in',
                'smtp_port' => 587,
            // 'smtp_timeout' => '7', 
                'smtp_user' => $email_parameters['from'],
                'smtp_pass' => $email_parameters['password'],
                'mailtype' => 'html',
                'charset'   => 'iso-8859-1',
                'smtp_crypto' => 'tls',

            );
            /*$email_config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'mail.yakrm.com',
                'smtp_port' => 25,
                // 'smtp_timeout' => '7', 
                'smtp_user' => $email_parameters['from'],
                'smtp_pass' => $email_parameters['password'],
                'mailtype' => 'html',
                'charset'   => 'utf-8',
                'smtp_crypto' => 'tls',
                
            );*/

        }
        $this->ci->email->initialize($email_config);
        $this->ci->email->set_newline("\r\n");
        $this->ci->email->to($email_parameters['to']);
        $this->ci->email->from($email_parameters['from'], $email_parameters['from_name']);
        //$this->ci->email->cc($email_parameters['cc']);
        $this->ci->email->subject($email_parameters['subject']);
        $this->ci->email->message($email_parameters['description']);
        if (!$this->ci->email->send()) {
            show_error($this->ci->email->print_debugger());
            die;
        } else {
            return true;
        }
    }

    // Send SMS Functionality
    /*$sms_data = array(
        'curl_url' => 'CURL_URL',
        'sender_title' => 'SENDER_TITLE',
        'mobile_no' =>'MOBILE_NO',
        'message' => 'MESSAGE',
        'auth_key' =>'AUTH_KEY'
    );*/
    public function send_sms($sms_data) {
        $curl = curl_init();
        // echo "<pre>";
        // print_r($sms_data);
        // die;
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://control.msg91.com/api/sendotp.php?otp=".$sms_data['otp']."&sender=STKPTS&message=".$sms_data['message']."&mobile=".$sms_data['mobile']."&authkey=".SMS_AUTH_KEY."",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "",
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;

        } else {
            // echo $response;
        }
        /*$message = urlencode($sms_data['message']);
        $curl = curl_init();
        $sender_title = $sms_data['sender_title'];
        $mobile_no = $sms_data['mobile_no'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $sms_data['curl_url'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"sender\": \"$sender_title\", \"route\": \"4\", \"country\": \"91\", \"sms\": [ { \"message\": \"$message\", \"to\": [ \"$mobile_no\"] } ] }",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER => array(
                "authkey: " . $sms_data['auth_key'],
                "content-type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //echo $response;
            return true;
        }*/
    }

    // Normal SMS
    function send_normal_send_sms($sms_data){
        $curl = curl_init();
        /*<MESSAGE> 
                                    <AUTHKEY>".SMS_AUTH_KEY."</AUTHKEY> 
                                    <SENDER>STKPTS</SENDER> 
                                    <ROUTE>default</ROUTE> 
                                    <CAMPAIGN>BULKSMS</CAMPAIGN> 
                                    <COUNTRY>91</COUNTRY> 
                                    <SMS TEXT=\"".$sms_data['message']."\" > 
                                        <ADDRESS TO=\"".$sms_data['mobile_no']."\"></ADDRESS>  
                                    </SMS> 
                                </MESSAGE>*/
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://control.msg91.com/api/postsms.php",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "<MESSAGE> 
                                    <AUTHKEY>".SMS_AUTH_KEY."</AUTHKEY> 
                                    <SENDER>STKPTS</SENDER> 
                                    <ROUTE>4</ROUTE> 
                                    <CAMPAIGN>BULKSMS</CAMPAIGN> 
                                    <COUNTRY>91</COUNTRY> 
                                    <SMS TEXT='".$sms_data['message']."' > 
                                        <ADDRESS TO='".$sms_data['mobile_no']."'></ADDRESS>  
                                    </SMS> 
                                </MESSAGE>",
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/xml"
          ),
        ));
        curl_setopt($curl, CURLOPT_TIMEOUT,500);
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          // echo "cURL Error #:" . $err;
          return $err;
        } else {
          // echo $response;
          // print_r($response);
        }
        // die;
    }

    // Converts to hours and days
    function convert_to_hours_and_days($parameters){
        $datetime_ratio = explode('-',$parameters['working_datetime']);
        $start_date_time = strtotime(date('Y-m-d H:i:s',strtotime($datetime_ratio[0])));
        $end_date_time = strtotime(date('Y-m-d H:i:s',strtotime($datetime_ratio[1])));
        $diff = $end_date_time - $start_date_time;
        $days = floor($diff/(60*60*24));
        $hours   = floor(($diff-($days*60*60*24))/(60*60));
        $total_hours = $days.":".$hours;
        return $total_hours;
    }

    function convert_to_hours($parameters){
        $total_hours = 0;
        foreach ($parameters as $date_time) {
            $datetime_ratio = explode('-',$date_time);
            $date1 =  new DateTime(date('Y-m-d h:i:s',strtotime($datetime_ratio[0])));
            $date2 =  new DateTime(date('Y-m-d h:i:s',strtotime($datetime_ratio[1])));
            // echo date('Y-m-d h:i:s',strtotime($datetime_ratio[0])) ;
            // echo "<br>";
            $diff = $date2->diff($date1);
            // echo date('Y-m-d h:i:s',strtotime($datetime_ratio[1])) ;
            $hours = $diff->h;
            $hours = $hours + ($diff->days*24);
            $total_hours += $hours;
        }
        // echo "<pre>";
        // print_r($parameters);
        // echo $total_hours;
        // die;
        return $total_hours;
    }

    // Send Bunch of Notifications
    function send_bunch_notification($config){
        if($config['is_android'] != null){
            $url = 'https://fcm.googleapis.com/fcm/send';
            $server_key = SERVER_KEY_AND;
            $fields = array();
            if(isset($config['blog_id'])){
                $data= array(
                    'subject'=> $config['subject'],
                    'description'=> $config['message'],
                    'blog_id' => $config['blog_id'],
                    'blog_title' => $config['blog_title'],
                    'blog_image' => $config['blog_image'],
                    'type' => 'article',
                    'app_language_id'=>$config['app_language_id']
                );
            }else if(isset($config['video_id'])){
                $data= array(
                    'subject'=> $config['subject'],
                    'description'=> $config['message'],
                    'video_id' => $config['video_id'],
                    'video_title' => $config['video_title'],
                    'video_description' => $config['description'],
                    'video_url' => $config['video_url'],
                    'type' => 'video',
                    'blog_category_id'=>$config['blog_category_id'],
                    'app_language_id'=>$config['app_language_id']
                );
            }else if(isset($config['audio_id'])){
                $data= array(
                    'subject'=> $config['subject'],
                    'description'=> $config['message'],
                    'audio_id' => $config['audio_id'],
                    'audio_title' => $config['audio_title'],
                    'audio_description' => $config['description'],
                    'audio_thumbnails' => $config['audio_thumbnails'],
                    'audio_url' => $config['audio_url'],
                    'type' => 'audio',
                    'blog_category_id'=>$config['blog_category_id'],
                    'app_language_id'=>$config['app_language_id']
                );
            }else if(isset($config['course_id'])){
                $data= array(
                    'subject'=> $config['subject'],
                    'description'=> $config['message'],
                    'course_id' => $config['course_id'],
                    'course_name' => $config['course_name'],
                    'course_description' => $config['description'],
                    'course_image' => $config['course_image'],
                    'course_type' => $config['course_type'],
                    'type' => 'course',
                    'app_language_id'=>$config['app_language_id'],
                    'course_package_type'=>$config['course_package_type']
                );
            }else if(isset($config['subscription_offer'])){
                $data= array(
                    'type' => 'offers',
                    'subject'=> $config['subject'],
                    'description'=> $config['message']
                );
            }
            else{
                $data= array(
                    'subject'=> $config['subject'],
                    'description'=> $config['message']
                );   
            }
            
            $fields['data'] = $data;
            $target = $config['gcm_id'];
            
            if(is_array($target)){
                $fields['registration_ids'] = $target;
            }else{
                $fields['to'] = $target;
            }
            
            $headers = array(
                'Content-Type:application/json',
                'Authorization:key='.$server_key
            );
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            }
            curl_close($ch);
        }
        return true;
        /*if($config['is_ios'] == 1){
            $push = new ApnsPHP_Push(
                ApnsPHP_Abstract::ENVIRONMENT_SANDBOX,
                'assets/ios_certificates/YakrmDevCertificates.pem'
            );
            $push->connect();
            foreach ($config["apn_id"] as $list) {
                $v= trim($list);
                $message = new ApnsPHP_Message($v);
                $message->setTitle($config['subject']);
                $message->setText($config['message']);
                $push->add($message);
                $push->send();
                $push->disconnect();
                $aErrorQueue = $push->getErrors();
                if (!empty($aErrorQueue)) {
                    var_dump($aErrorQueue);
                }
            }
            
        }*/
    }

    // Push Notifications code
    //$config = array('apn_id/gcm_id'=>$id,'subject'=>$subject,'description'=>$description);
    /*function push_notifications($config){
        if(isset($config['apn_id'])){
            $push = new ApnsPHP_Push(
                ApnsPHP_Abstract::ENVIRONMENT_SANDBOX,
                'assets/ios_certificates/YakrmDevCertificates.pem'
            );
            $push->connect();
            $message = new ApnsPHP_Message($config['apn_id']);
            $message->setTitle($config['subject']);
            $message->setText($config['description']);
            //$message->setExpiry(30);
            $push->add($message);
            $push->send();
            $push->disconnect();
            $aErrorQueue = $push->getErrors();
            // echo "<pre>";
            // echo $config['apn_id'];
            // print_r($aErrorQueue);
            // die;

            if (!empty($aErrorQueue)) {
                var_dump($aErrorQueue);
            }   
        }elseif(isset($config['gcm_id'])){
            $url = 'https://fcm.googleapis.com/fcm/send';
            $server_key = 'AIzaSyBYSolO428exrywVHtiafM_nG-Skgbaa6k';
            $fields = array();
            $data= array(
                'subject'=> $config['subject'],
                'description'=> $config['description']
            );
            $fields['data'] = $data;
            $target = $config['gcm_id'];
            
            if(is_array($target)){
             $fields['registration_ids'] = $target;
            }else{
             $fields['to'] = $target;
            }
            
            $headers = array(
              'Content-Type:application/json',
              'Authorization:key='.$server_key
            );
           
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('FCM Send Error: ' . curl_error($ch));
            }

            curl_close($ch);
            //return $result;
        }
        
    }*/

}
