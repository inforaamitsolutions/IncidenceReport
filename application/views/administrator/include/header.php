<header class="main-header">
    <a href="<?php echo base_url().ADMIN; ?>" class="logo">
        <span class="logo-mini">I R</span>        
        <span class="logo-lg">Incidence Report</span>
    </a>
    <nav class="navbar navbar-static-top">        
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <?php
        $this->load->helper('apiauth_helper');
       // $app_language = get_app_languages();
        ?>
        
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-database"></i> DB
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <ul class="menu">
                                <li class="bg-success">
                                    <a href="<?= base_url().ADMIN.'/migrate' ?> " class="text-success" onclick="return confirm('Note : It will add new table to your DB. Are you sure you want to migrate?')">
                                        <i class="fa fa-database text-success"></i> Migrate
                                    </a>
                                </li>
                                <li class="bg-danger">
                                    <a href="<?= base_url().ADMIN.'/migrate/undo_migration' ?> " onclick="return confirm('Note : Tables will be remove you may lost inserted data. Are you sure you want to rollback?')">
                                        <i class="fa fa-database text-danger"></i> Rollback
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>  -->
              
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">
                            <?php 
                            $session =  $this->session->admin_df_session; 
                            echo $session['name'];
                            ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= base_url().ADMIN.'/signin/change_password' ?>" class="btn btn-default btn-flat">Change Password</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url().ADMIN; ?>/signin/signout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                            
            </ul>
            
        </div>
    </nav>
</header>