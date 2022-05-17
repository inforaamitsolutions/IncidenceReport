<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tbl_admin extends CI_Migration {
    public function up(){
        $attributes = array('ENGINE' => 'InnoDB');
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'mobile' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'otp' => array(
                'type' => 'INT',
            ),
            'is_otp_verify' => array(
                'type' => 'BOOLEAN',
                'default' => 0,
            ),
            'is_email_verify' => array(
                'type' => 'BOOLEAN',
                'default' => 0,
            ),
            'is_active' => array(
                'type' => 'BOOLEAN',
                'default' => 0,
            ),
            'created_at' => array(
                'type' => 'DATETIME',
            ),
        ));
        
        $this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_admin', FALSE, $attributes);

        $data2 = array(
            'name'=>"admin",
            'email'=>'admin@gmail.com',
            'mobile'=>'123456789',
            'password'=>'25d55ad283aa400af464c76d713c07ad',
            'is_active'=>1,
            'created_at'=>date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_admin',$data2);
        // $this->db->query('ALTER TABLE `tbl_quiz` ADD CONSTRAINT `tbl_quiz_blog_category_id_fk` FOREIGN KEY(`blog_category_id`) REFERENCES tbl_blogs_category(`id`) ON DELETE CASCADE ON UPDATE CASCADE;'); 
        // $this->db->query('ALTER TABLE `tbl_quiz` ADD CONSTRAINT `tbl_quiz_app_language_id_fk` FOREIGN KEY(`app_language_id`) REFERENCES tbl_app_language(`id`) ON DELETE CASCADE ON UPDATE CASCADE;'); 

    }

    public function down(){
        $this->dbforge->drop_table('tbl_admin');
    }
}