<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Incidence Report | Find Account </title>
        <link rel="icon" href="<?php echo base_url(); ?>upload/favicon.ico">
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
        <style type="text/css">
            body {
                /*background: linear-gradient(70deg, #67cad8 41.5%, #ef4158 40%) no-repeat !important;*/
            }
        </style>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Incidence Report</b></a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Please enter your email to find your account.</p>
                <?php echo form_open(ADMIN.'/signin/check_email'); ?>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Email" name="email" value="<?= $this->session->flashdata('email') ?>" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                 
                                <?php
                                if(!empty($_SERVER['HTTP_REFERER'])){
                                 ?>
                                 <a href="<?php print_r($_SERVER['HTTP_REFERER']); ?>">Back to Signin</a> 
                                 <?php   
                                }
                                // print_r($_SERVER['HTTP_REFERER']);
                                ?>
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label>
                            <?php
                            // print_r($_SERVER['HTTP_REFERER']);
                            if ($this->session->flashdata('message_error') != "") {
                                echo '<label style="color:red;">' . $this->session->flashdata('message_error') . "</label><br/>";
                            }
                            ?>
                        </label>
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