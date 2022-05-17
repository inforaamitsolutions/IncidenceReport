<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->helper('url');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> IncidenceReport | Sign In </title>
        <link rel="icon" href="<?= base_url('assets/images/favicon.ico') ?>">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Incidence Report</b></a>
            </div>
            <input type="hidden" id="base_url" value="<?= base_url() . ADMIN . '/' ?>">
            <div class="login-box-body">
                <p class="login-box-msg">Please Login With Your Credentials.</p>
                <?php
                echo form_open(ADMIN.'/signin/login_auth'); 
                //echo form_open();
                ?>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo $this->session->flashdata('email'); ?>" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <a href="<?= base_url(ADMIN.'/signin/find_account') ?>">Forget Password...?</a>
                            <label class="error_meesage">
                                <?php
                                if ($this->session->flashdata('message_error') != "") {
                                    echo '<label style="color:red;">' . $this->session->flashdata('message_error') . "</label>";
                                }
                                ?>
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
                
                
                <?php echo form_close(); ?>
            </div>
            

        </div>
        
        <!-- jQuery 3 -->
        <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>