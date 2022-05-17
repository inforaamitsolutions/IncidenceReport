<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tbl_incidence extends CI_Migration {
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
            'description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'latitude' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'longitude' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'address' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'date' => array(
                'type' => 'DATE',
            ),
            'time' => array(
                'type' => 'TIME',
            ),
            'status' => array(
                'type' => 'BOOLEAN',
                'default' => 0,
            ),
            'report count' => array(
                'type' => 'INT',
            ),
            'created_at' => array(
                'type' => 'DATETIME',
            ),
        ));
        
        $this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_incidence', FALSE, $attributes);
        $this->db->query('ALTER TABLE `tbl_incidence` ADD CONSTRAINT `tbl_incidence` FOREIGN KEY(`user_id`) REFERENCES tbl_user(`id`) ON DELETE CASCADE ON UPDATE CASCADE;'); 
    }

    public function down(){
        // $this->dbforge->drop_table('tbl_admin');
    }
}