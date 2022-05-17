<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Incidence Report | Dashboard </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php
    include 'include/styles.php';
    ?>
</head>

<body class="hold-transition skin-purple-light sidebar-mini">
    <input type="hidden" id="base_url" value="<?= base_url(ADMIN) . '/' ?>">
    <div class="wrapper">
        <?php include('include/header.php'); ?>
        <?php include('include/sidebar.php'); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                </ol>
            </section>
            <section class="content">
                <?php
                include 'alert/main-alert.php';
                ?>
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?= count($all_user) ?></h3>
                                <p>Total Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="<?= base_url() . ADMIN . '/' ?>users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?= COUNT($all_subscribers) ?></h3>
                                <p>Subscribe Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="<?= base_url(ADMIN . '/users_subscribe') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?= COUNT($all_subscription_plan) ?></h3>
                                <p>Subscription Plan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="<?= base_url(ADMIN . '/subscription') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?= COUNT($all_incidence) ?></h3>
                                <p>Incidence</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?= base_url(ADMIN . '/users') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title"> New User List </h3>
                            </div>
                            <div class="box-body table-responsive">
                                <table id="users_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>User Email</th>
                                            <th>User Mobile No</th>
                                            <th>At</th>
                                            <th>Is Active?</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($all_user as $list) :
                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $list['name'] ?></td>
                                                <td><?= $list['email'] ?></td>
                                                <td><?= $list['mobile'] ?></td>
                                                <td>
                                                    <?= form_label(date('d M, y', strtotime($list['created_at'])), 'username', array('class' => 'label label-success')) ?>
                                                </td>
                                                <td>
                                                    <div class="col-sm-5">
                                                        <button type="button" class="btn btn-sm user_active btn-toggle <?php if ($list['is_active'] == 1) echo "active"; ?>" data-id="<?= $list['id'] ?>" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                            <div class="handle"></div>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo ' ' . anchor(ADMIN . '/dashboard/remove_user/' . $list['id'], '<i class="fa fa-trash"></i>', array('class' => 'label label-danger', 'title' => 'Remove', 'onclick' => "return confirm('Are you sure?')"));
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        endforeach;

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </section>
        </div>
        <?php include('include/footer.php'); ?>
    </div>
    <?php
    include 'include/script.php';
    ?>
    <script type="text/javascript">
        $("#users_list").DataTable();
        //$("#other_users").DataTable();
        var base_url = '<?= base_url() ?>';

        $('.user_active').on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                url: base_url + "ajax/active_deactive_user",
                data: {
                    id: id
                },
                //contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(result) {
                    /*if (result == 1)
                        alert('Activate the Vendor.');
                    else if (result == 0)
                        alert('Deactivate the Vendor.');
                    else
                        alert('Error');*/
                }
            });
        });

        // Form Validation Code
        $("#form_users_add").validate({
            rules: {
                'name': {
                    required: true,
                    minlength: 5
                },
                'user_role': {
                    required: true,
                },
                'email': {
                    required: true,
                    email: true,
                    remote: base_url + "ajax/reg_email_check"
                },
                'mobile': {
                    required: true,
                    maxlength: 10,
                    number: true,
                    minlength: 10,
                    remote: base_url + "ajax/reg_mobile_no_check"
                },
                'password': {
                    required: true,
                    minlength: 7
                }
            },
            messages: {
                'name': {
                    required: "This Field is Required",
                    minlength: "Please enter proper name with more than 5 characters."
                },
                'user_role': {
                    required: "This Field is Required",
                },
                'email': {
                    required: "This Field is Required",
                    email: "Enter Valid Email",
                    remote: "Email ID Exist"
                },
                'mobile': {
                    required: "This Field is Required",
                    maxlength: "You can not enter more than 10 digit.",
                    minlength: "You can not enter less than 10 digit.",
                    number: "This number is not valid.",
                    remote: "Mobile no Exist"
                },
                'password': {
                    required: "This Field is required.",
                    minlength: "Please set minimum 7 alpha-num for your password."
                }
            }
        });
        $("#video_id").on('change', function() {
            $("#blog_id").val($("#blog_id option:first").val());
            $("#audio_id").val($("#audio_id option:first").val());
            $("#course_id").val($("#audio_id option:first").val());
        });
        $("#blog_id").on('change', function() {
            $("#video_id").val($("#video_id option:first").val());
            $("#audio_id").val($("#audio_id option:first").val());
            $("#course_id").val($("#audio_id option:first").val());
        });
        $("#audio_id").on('change', function() {
            $("#blog_id").val($("#blog_id option:first").val());
            $("#video_id").val($("#video_id option:first").val());
            $("#course_id").val($("#audio_id option:first").val());
        });
        $("#course_id").on('change', function() {
            $("#blog_id").val($("#blog_id option:first").val());
            $("#video_id").val($("#video_id option:first").val());
            $("#audio_id").val($("#audio_id option:first").val());
        });
    </script>
</body>

</html>