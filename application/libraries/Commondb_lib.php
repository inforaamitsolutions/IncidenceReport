<?php
/*
*NOTE: It is a common Library for basic CRUD operartion for All Table
*      It's a time consuming process for same work.
*/
class Commondb_lib {
    protected $ci;
    // Construcot to load any library
    public function __construct(){
        //parent::__construct();
        $this->ci =& get_instance();
    }

    /**
     * New Optimized Code 
     *
     * @param string $table
     * @param array $data
     * @param string $id
     * @return void
     */
    public function createOrUpdate(string $table, array $data, string $id = null){
        if($id != null){
            // Update
            $updated_data = $this->ci->db->set($data)
                    ->where('id',$id)
                    ->update($table);
            return $updated_data;
        }

        // New
        $data['created_at'] = date('Y-m-d h:i:s');
        $inserted_data = $this->ci->db->insert($table,$data);
        return $inserted_data;
        
    }

    // Functions to insert Record
    public function insert_record($table,$data){
        $this->ci->db->insert($table,$data);
        return $this->ci->db->insert_id();
    }

    // Functions to Update Records
    public function update_record($table,$update_id,$data){
        $this->ci->db->set($data)
                    ->where('id',$update_id)
                    ->update($table);
        return $update_id;
    }

    public function insert_multi_record($table,$data){
        $this->ci->db->insert_batch($table,$data);
        return true;
    }
    
    //Functions to remove records
    public function remove_record($table,$delete_id,$is_multiple_delete){
        if($is_multiple_delete == true){
            $this->ci->db->where_in('id', $delete_id);
            $this->ci->db->delete($table);
        }else{
            $this->ci->db->delete($table,array('id'=>$delete_id));
        }
        
        return $delete_id;
    }

    // Function for get All Records of tables
    public function get_all_records($table){
        //$res = $this->ci->db->get($table)->order_by('id DESC')->result_array();
        $res = $this->ci->db->select('*')
                ->from($table)
                ->order_by('id DESC')
                ->get()
                ->result_array();
        return $res;
    }

    // Functions for get All Active Records
    public function get_all_active_records($table){
        $res = $this->ci->db->get_where($table,array('is_active'=>1))->result_array();
        return $res;
    }

    // Functions for get records by id
    public function find_record_by_id($table,$id){
        $res = $this->ci->db->get_where($table,array('id'=>$id))->row_array();
        return $res;
    }

    // Authentication check code OR find data by particular field
    public function find_by_field($table,$field_name,$field_data){
        $res = $this->ci->db->get_where($table,array($field_name.' like binary'=>$field_data))->row_array();
        /*$res = $this->ci->db->select('*')
                ->from($table)
                ->where($field_name.' like binary', $field_data)
                ->get()
                ->row_array();*/
        return $res;
    }

    // Match Multiple fields for Single Record
    function get_records_by_multiple_fields($table, $fields_data){
        // print_r($fields_data);die;
        // $res = $this->ci->db->get_where($table,array($fields_data))->row_array();        
        $res = $this->ci->db
                    ->select('*')
                    ->from($table)
                    // ->where($fields_data)
                    ->order_by('id DESC')
                    ->get()
                    ->result_array();
        return $res;
    }

    function getrow_by_multiple_fields($table, $fields_data){
        // $res = $this->ci->db->get_where($table,array($fields_data))->row_array();
        $res = $this->ci->db
                    ->select('*')
                    ->from($table)
                    ->where($fields_data)
                    ->order_by('id DESC')
                    ->get()
                    ->row_array();
        return $res;
    }
}
