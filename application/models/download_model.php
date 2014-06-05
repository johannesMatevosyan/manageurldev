<?php

class Download_model extends CI_Model{

    function get_store_records()
    {
        $query = $this->db->get('store_id');
        return $query->result();
    }
    /**
     * This table collects value of maximum id number per insert.
     * In this way we define range to order dowloading files
     */
    function get_last_id($id = null)
    {
        $this->db->select_max('id');
        $Q = $this->db->get('db_manager');
        $max_row = $Q->row_array();
        return $max_row['id'];
    }

    function add_max_id()
    {
        $data[] = array();
        $data = $this->get_last_id();
        print_r($data);
        $this->db->insert('store_id', $data);
    }
    function add_record($data)
    {
        $this->db->insert('store_id', $data);
    }
}