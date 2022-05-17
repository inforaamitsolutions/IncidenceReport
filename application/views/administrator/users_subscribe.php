<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Incidence Report | Subscribers </title>
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
                <h1>Subscribers</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url() . ADMIN . '/dashboard' ?>"><i class="fa fa-dashboard"></i> Dahsboard</a>
                    </li>
                    <li class="active">Subscribers</li>
                </ol>
            </section>
            <section class="content">
                <?php
                include 'alert/main-alert.php';
                ?>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <!-- <span class="pull-right">
								<a href="<?= base_url() . ADMIN . '/subscription/create' ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Subscription</a>																		
							</span> -->
                            </div>
                            <div class="box-body table-responsive">
                                <table id="subscription_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>Plan</th>
                                            <th>Days Count</th>
                                            <th>Transaction Id</th>
                                            <!-- <th>Payment Status?</th> -->
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($all_subscribers as $list) :
                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $list['user_name'] ?></td>
                                                <td><?= $list['plan_title'] ?></td>
                                                <td><?= $list['days_count'] ?></td>
                                                <td><?= $list['transaction_id'] ?></td>
                                                <!-- <td>
                                                    <div class="col-sm-5">
                                                        <button type="button" class="btn btn-sm subscription_list_active btn-toggle <?php if ($list['status'] == 1) echo "active"; ?>" data-id="<?= $list['id'] ?>" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                            <div class="handle"></div>
                                                        </button>
                                                    </div>
                                                </td> -->
                                                <!-- <td>
                                                    <?php
                                                    echo ' ' . anchor(ADMIN . '/subscription/edit/' . $list['id'], '<i class="fa fa-pencil"></i>', array('class' => 'label label-primary', 'title' => 'Edit'));
                                                    // echo ' '.anchor(ADMIN . '/Users/remove_user/'.$list['id'], '<i class="fa fa-trash"></i>', array('class' => 'label label-danger', 'title' => 'Remove', 'onclick'=>"return confirm('Are you sure?')"));        
                                                    ?>
                                                </td> -->
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
        $("#subscription_list").DataTable();
        var base_url = '<?= base_url() ?>';
        $('.subscription_list_active').on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                url: base_url + "ajax/active_deactive_subscription",
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
    </script>
</body>

</html>