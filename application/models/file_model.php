<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/21/14
 * Time: 6:58 PM
 * To change this template use File | Settings | File Templates.
 */

class File_model extends CI_Model {

    function __construct()
    {
         parent::__construct();
    }
    function add_record($data)
    {
        $this->db->insert('excel', $data);
    }

    function get_record_by_header($id)
    {
        $query = $this->db->get_where('excel', array('URL' => $id));
        return $query->result();
    }
    function get_record($id)
    {
        $query = $this->db->get_where('excel', array('id' => $id));
        return $query->result();
    }
    function get_records()
    {
        $query = $this->db->get('excel');
        return $query->result();
    }
    function update_record($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('excel', $data);
    }

    /**
     * get_last_id() function collects maximum id number in 'excel' table.
     * In this way we define range to order downloading files
     */
    function get_last_id()
    {
        $this->db->select_max('id');
        $query = $this->db->get('excel');
        $max_row = $query->row_array();
        return $max_row['id'];
    }

}