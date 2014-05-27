<?php

class Site_model extends CI_Model{

    function get_records()
    {
        $query = $this->db->get('db_manager');
        return $query->result();
    }

    function get_record_by_id($id)
    {
        $query = $this->db->get_where('membership', array('id' => $id));
        return $query->result();
    }

    function add_record($data)
    {
        $this->db->insert('db_manager', $data);
        return;
    }

    function update_record($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('db_manager', $data);
    }

    function delete_row($id)
    {
        /** figure out deleted id,
         *  segment(3) = controller/method/id
         */
        $this->db->where('id', $id);
        $this->db->delete('db_manager');
    }

    function get_record_by_header($id)
    {
        $query = $this->db->get_where('db_manager', array('header_title' => $id));
        return $query->result();
    }

}