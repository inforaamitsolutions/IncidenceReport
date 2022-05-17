<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tbl_user_subscribe extends CI_Migration {
    public function up(){
        $attributes = array('ENGINE' => 'InnoDB');
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
            ),
            'plan_id' => array(
                'type' => 'INT',
            ),
            'days_count' => array(
                'type' => 'INT',
            ),
            'transaction_id' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'payment_status' => array(
                'type' => 'BOOLEAN',
                'default' => 0,
            ),      
            'status' => array(
                'type' => 'BOOLEAN',
                'default' => 0,
            ),            
            'created_at' => array(
                'type' => 'DATETIME',
            ),
        ));
        
        $this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_user_subscribe', FALSE, $attributes);
        $this->db->query('ALTER TABLE `tbl_user_subscribe` ADD CONSTRAINT `tbl_user_subscribe` FOREIGN KEY(`user_id`) REFERENCES tbl_user(`id`) ON DELETE CASCADE ON UPDATE CASCADE;'); 
        $this->db->query('ALTER TABLE `tbl_user_subscribe` ADD CONSTRAINT `tbl_user_subscribe_plan_id` FOREIGN KEY(`plan_id`) REFERENCES tbl_subscription_plan(`id`) ON DELETE CASCADE ON UPDATE CASCADE;'); 
    }

    public function down(){
        // $this->dbforge->drop_table('tbl_admin');
    }
}