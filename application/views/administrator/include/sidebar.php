<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <?php
            $main_nav     = $this->uri->segment(1);
            $current_cont = $this->uri->segment(2);
            $cont_method  = $this->uri->segment(3);
            $segment3     = $this->uri->segment(4);

            // Using for Course Type
            $segment4     = $this->uri->segment(5);
            // Course Edit
            $segment5     = $this->uri->segment(5);
            ?>
            <li class="header">MAIN NAVIGATION</li>
            <li <?php if ($current_cont == 'dashboard') { echo 'class="active"'; } ?>>
                <a href="<?php echo base_url() . ADMIN; ?>/dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li <?php if ($current_cont == 'users') { echo 'class="active"'; } ?>>
                <a href="<?php echo base_url() . ADMIN; ?>/users">
                    <i class="fa fa-users"></i> <span>Users</span>
                </a>
            </li>
            <li <?php if ($current_cont == 'subscription') { echo 'class="active"'; } ?>>
                <a href="<?php echo base_url() . ADMIN; ?>/subscription">
                    <i class="fa fa-list"></i> <span>Subscription Package
                </a>
            </li>
            <li <?php if ($current_cont == 'users_subscribe') { echo 'class="active"'; } ?>>
                <a href="<?php echo base_url() . ADMIN; ?>/users_subscribe">
                    <i class="fa fa-bars"></i> <span>Subscribers
                </a>
            </li>
        </ul>
    </section>
</aside>