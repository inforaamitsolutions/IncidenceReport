<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Incidence Report | Change Password</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- COMMON STYLES -->
    <?php
    include 'include/styles.php';
    ?>
    <!-- END COMMON STYLES -->
</head>
<body class="hold-transition skin-purple-light sidebar-mini">
    <input type="hidden" id="base_url" value="<?= base_url()  . ADMIN . '/' ?>">
    <div class="wrapper">
        <?php include('include/header.php'); ?>
        <?php include('include/sidebar.php'); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Change Password
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url().ADMIN.'/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Change Password</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"> </h3>
                            </div>
                            <?php echo form_open(ADMIN . '/signin/update_change_password',array('id'=>'form_update_change_password')); ?>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" class="form-control" placeholder="Old Password" name="old_password" id="old_password" required>
                                            <input type="hidden" id="admin_id" name="id" value="<?= $this->session->admin_df_session['id'] ?>">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" placeholder="New Password" name="new_password" id="new_password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Re-Enter Password</label>
                                            <input type="password" class="form-control" placeholder="Re-Enter Password" name="re_enter_pass" id="re_enter_pass" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include('include/footer.php'); ?>
    </div>

    <!-- Common Script Files -->
    <?php
    include 'include/script.php';
    ?>
    <!-- END Common Script Files -->

    <!-- ADDITIONAL Script Files-->
    <!-- <script src="<?= base_url() ?>assets/js/admin_signin.js"></script> -->
    <!-- END ADDITIONAL Script Files-->
    <script type="text/javascript">
            // Change Password Forms
            var id = $("#admin_id").val();
            var base_url = $("#base_url").val();
            $("#form_update_change_password").validate({
                rules: {
                    'old_password': {
                        required: true,
                        remote: base_url + "signin/ajax_password_check/"+id
                    },
                    'new_password':{
                        required: true,
                        minlength: 7
                    },
                    "re_enter_pass":{
                        required: true,
                        equalTo : '#new_password'
                    },
                },
                messages: {
                    'old_password': {
                        required: "This Field is Required",
                        remote: "Please enter valid old password"
                    },
                    'new_password':{
                        required: "This Field is Required",
                        minlength: "Enter minimum 7 alphanum."
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