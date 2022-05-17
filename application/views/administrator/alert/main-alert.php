<?php
if ($this->session->flashdata('message_error') != "") :
?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        <?= $this->session->flashdata('message_error') ?>
    </div>
<?php
endif;
if ($this->session->flashdata('message_success') != "") :
?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        <?= $this->session->flashdata('message_success') ?>
    </div>
<?php
endif;
?>