<?php

class Download_model extends CI_Model{

    /**
     * get_store_records() function takes all record from 'store_id' table.
     * Support Controller: file, download
     */
    function get_store_records()
    {
        $query = $this->db->get('store_id');
        return $query->result();
    }

    /**
     * get_last_id() function collects maximum id number in 'excel' table.
     * In this way we define range to order downloading files
     */
    function get_last_id()
    {
        $this->db->select_max('id');
        $query = $this->db->get('store_id');
        $max_row = $query->row_array();
        return $max_row['id'];
    }

    /**
     *  add_record() function adds new row in to 'store_id' table.
     *  Support Controller: file
     */
    function add_record($data)
    {
        $this->db->insert('store_id', $data);
    }

    /**
     *  update_record() function updates new row in to 'store_id' table.
     *  Support Controller: file
     */
    function update_record($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('store_id', $data);
    }

    /**
     *  truncate all logs from the table where they are stored.
     */
    function delete_records()
    {
        $this->db->truncate('store_id');
    }


}