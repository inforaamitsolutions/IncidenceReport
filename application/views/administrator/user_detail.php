<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Stock Pathshala | <?= $user['name'] ?>  </title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php
	include 'include/styles.php';
	?>
</head>
<body class="sidebar-mini wysihtml5-supported skin-purple-light">
	<input type="hidden" id="base_url" value="<?= base_url() . ADMIN . '/' ?>">
	<div class="wrapper">
		<?php include('include/header.php'); ?>
		<?php include('include/sidebar.php'); ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					User Details
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?= base_url().ADMIN.'/dashboard' ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li><a href="<?= base_url().ADMIN.'/users' ?>">Users</a></li>
					<li class="active">User Detail</li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
					<div class="col-md-4">
						<div class="box box-primary">
							<div class="box-body box-profile">
								<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/uploads/profile_images/noimages.png" alt="User profile picture">

								<h3 class="profile-username text-center"><?= $user['name'] ?></h3>

								<p class="text-muted text-center">
									<?php
									if($user['is_active'] == 1){
										echo form_label('Active', 'username', array('class'=>'label label-success'));
									}else{
										echo form_label('Deactive', 'username', array('class'=>'label label-danger'));
									}
									?>
								</p>

								<ul class="list-group list-group-unbordered">
									<li class="list-group-item">
										<b>Email</b> <a class="pull-right"><?php echo $user['email']; ?></a>
									</li>
									<li class="list-group-item">
										<b>Mobile No</b> <a class="pull-right"><?php echo $user['mobile']; ?></a>
									</li>
									<li class="list-group-item">
										<b>Subscription Plan</b> <a class="pull-right">Subscription 2</a>
									</li>
                                    <li class="list-group-item">
										<b>Days Count</b> <a class="pull-right">22</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
                    <div class="col-md-8">
                        <div class="box box-primary">
                            <div class="box-header">
                               <h3>Incidence</h3>
                            </div>
                            <div class="box-body table-responsive">
                                <table id="users_list" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>description</th>
                                            <th>address</th>
                                            <th>Report Count</th>
                                            <th>date</th>
                                            <th>Is Active?</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Description</td>
                                                <td>Address</td>
                                                <td>3</td>
                                                <td>
                                                    <?= form_label(date('d M, y'), 'username', array('class'=>'label label-success')) ?>
                                                </td>
                                                <td>
                                                    <div class="col-sm-5">
                                                        <button type="button" class="btn btn-sm user_active btn-toggle active" data-id="5" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                            <div class="handle"></div>
                                                        </button>
                                                    </div>
                                                </td>
                                                <!-- <td>
                                                    <?php  
                                                       // echo ' '.anchor(ADMIN . '/Users/remove_user/'.'5', '<i class="fa fa-trash"></i>', array('class' => 'label label-danger', 'title' => 'Remove', 'onclick'=>"return confirm('Are you sure?')"));        
                                                    ?>
                                                </td> -->
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Description</td>
                                                <td>Address</td>
                                                <td>6</td>
                                                <td>
                                                    <?= form_label(date('d M, y'), 'username', array('class'=>'label label-success')) ?>
                                                </td>
                                                <td>
                                                    <div class="col-sm-5">
                                                        <button type="button" class="btn btn-sm user_active btn-toggle active" data-id="5" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                            <div class="handle"></div>
                                                        </button>
                                                    </div>
                                                </td>
                                                <!-- <td>
                                                    <?php  
                                                       // echo ' '.anchor(ADMIN . '/Users/remove_user/'.'5', '<i class="fa fa-trash"></i>', array('class' => 'label label-danger', 'title' => 'Remove', 'onclick'=>"return confirm('Are you sure?')"));        
                                                    ?>
                                                </td> -->
                                            </tr>
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
	<script>
		$(function(){
			$('#users_list').DataTable();
			$('.overlay').hide();

            //Date picker
            $('#datepicker').datepicker({
            	autoclose: true
            })

            //Date picker
            $('#datepicker1').datepicker({
            	autoclose: true
            })
        });
    </script>
    <script src="<?= base_url().'assets/js/users.js' ?>"></script>
</body>
</html>