<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Incidence Report | Add Subscription </title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php
        include 'include/styles.php';
        ?>
    </head>
    <body class="hold-transition skin-purple-light sidebar-mini">
        <input type="hidden" id="base_url" value="<?= base_url() . ADMIN . '/' ?>">
        <div class="wrapper">
            <?php include('include/header.php'); ?>
            <?php include('include/sidebar.php'); ?>
            <div class="content-wrapper">
				<section class="content-header">
                    <h1>
                        Edit Subscription
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url().ADMIN.'/dashboard' ?>"><i class="fa fa-dashboard"></i> Dahsboard</a></li>
                        <li><a href="<?= base_url().ADMIN.'/subscription' ?>"> Subscription </a></li>
                        <li class="active">Edit Subscription</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"> Edit Subscription </h3>
                                </div>
                                <?php
                                echo form_open_multipart(ADMIN.'/Subscription/update_subscription');
                                ?>
                                <div class="box-body">
                                    <div class="row">
                                    	<div class="col-md-4">
                                    		<div class="form-group">
                                            <input type="hidden" name="id" value="<?= $subscription['id'] ?>">
                                    			<label>Title</label>
                                    			<input type="text" placeholder="Subscription Title" class="form-control" name="title" id="title" value="<?= $subscription['title'] ?>" required>
                                    		</div>
                                    	</div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" placeholder="Subscription price" class="form-control" name="price" id="price" value="<?= $subscription['price'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Days Count</label>
                                                <input type="text" placeholder="Subscription Days Count" class="form-control" name="days_count" value="<?= $subscription['days_count'] ?>" id="days_count" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" placeholder="Description" name="description" id="description" required><?= $subscription['description'] ?></textarea>
                                            </div>
                                        </div>                                      
                                    </div>                                    
                                    <div class="row">                                       
                                    	<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Is Active?</label><br/>
                                                <input type="checkbox" name="status" id="status" <?= $subscription['status']==true ? "checked": "" ?> >
                                            </div>
                                        </div>                                       
                                    </div>                                   
                                </div>
                                <div class="box-footer">
                                	<button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Update </button>
                                </div>
                                <?php
                                echo form_close();
                                ?>
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
        <!-- CK Editor -->
	    <script src="<?= base_url('assets/') ?>bower_components/ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('description', {
                height: 300,
                filebrowserUploadUrl : base_url + "media/from_ck_upload"
            });
        </script>
    </body>
</html>