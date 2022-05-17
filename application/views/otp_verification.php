<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Incidence Report | OTP Verifications </title>
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
        <!--COMMON CSS -->
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
                <p>OTP Verification</p>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg" style="color: red;">Do not refresh this page without verification.</p>
                <p class="login-box-msg"><b>Dear <?= $user['name'] ?>,</b> </p>
                <p class="login-box-msg">Check your email/mobile no <?= $user['mobile'] ?> & <?= $user['email'] ?> to get an OTP.</p>
                <?php echo form_open(ADMIN.'/signin/otp_verified',array('id'=>'form_otp_verify')); ?>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="OTP" name="otp" id="otp" value="" required>
                    <a id="resend_otp" style="cursor: pointer;">Resend OTP</a>
                    <input type="hidden" name="id" id="id" value="<?= $user['id'] ?>">
                    <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                </div>
                <div class="form-group has-feedback">
                    <label id="resend_message">
                        
                    </label>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <!-- <a href="<?php echo base_url().'/signin'; ?>">Back to Signin</a> -->
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
        <!--- Validate JS --->
        <script src="<?= base_url() ?>assets/dist/js/jquery.validate.js"></script>
        <script src="<?= base_url() ?>assets/dist/js/additional-methods.js"></script>

        <script type="text/javascript">
            var base_url = $("#base_url").val();
            var id = $("#id").val();       
            $("#form_otp_verify").validate({
                rules: {
                    'otp': {
                        required: true,
                        remote: base_url + "signin/ajax_check_otp/"+id
                    },
                },
                messages: {
                    'otp': {
                        required: "This Field is Required",
                        remote: "Please enter valid OTP"
                    },
                }
            });

            // Resend OTP Verification
            $("#resend_otp").on('click',function(){ 
                $.ajax({
                    type: "POST",
                    url: base_url + "signin/resend_otp/"+id,
                    data: {id: id},
                    dataType: "json",
                    success: function (result) {
                        $("#resend_message").text("We've send you an OTP.");
                    }
                });
            });
        </script>
        
    </body>
</html>