<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Incidence Report | Update Password </title>
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
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/common.css">
        <style type="text/css">
            body {
                /*background: linear-gradient(70deg, #67cad8 41.5%, #ef4158 40%) no-repeat !important;*/
            }
        </style>
    </head>
    <input type="hidden" id="base_url" value="<?= base_url(ADMIN.'/') ?>">
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Incidence Report</b></a>
                <p>Update Password</p>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg" style="color: red;">Do not refresh this page without change your password.</p>
                <p class="login-box-msg"><b>Dear <?= $user['name'] ?>,</b> </p>
                <p class="login-box-msg">Your verifications is completed please change your password and update panel.</p>
                <?php echo form_open(ADMIN.'/signin/update_forgot_password',array('id'=>'form_forgot_update_password')); ?>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="New Password" name="new_password" id="new_password" value="" required>
                    <input type="hidden" name="id" id="id" value="<?= $user['id'] ?>">
                    <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" id="confirm_password" value="" required>
                    
                    <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Verify</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label>
                            <?php
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
        <script src="<?= base_url() ?>assets/dist/js/jquery.validate.js"></script>
        <script src="<?= base_url() ?>assets/dist/js/additional-methods.js"></script>
        
        <script type="text/javascript">
            // Change Password Forms
            $("#form_forgot_update_password").validate({
                rules: {
                    'new_password':{
                        required: true,
                        minlength: 7,
                    },
                    "confirm_password":{
                        required: true,
                        equalTo : '#new_password'
                    },
                },
                messages: {
                    
                    'new_password':{
                        required: "This Field is Required",
                        minlength: "Enter minimum 7 alphanum.",
                    },
                    "re_enter_pass":{
                        required: "This Field is Required",
                        equalTo: "Please enter same password."
                    },

                }
            });
        </script>
    </body>
</html>