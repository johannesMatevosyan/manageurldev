<?php

class Members_model extends CI_Model{

    function get_members()
    {
        $query = $this->db->get('membership');
        return $query->result();
    }

    function get_record_by_id($id)
    {
        $query = $this->db->get_where('membership', array('id' => $id));
        return $query->result();
    }

    function add_member($data)
    {
        $this->db->insert('membership', $data);
    }
    function update_member($name,$data)
    {
        $this->db->where('username', $name);
        $this->db->update('membership', $data);
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
    function get_record_by_username($name)
    {  
        $this->db->where('username', $name);
        $query = $this->db->get('membership');
        return $query->result();
    }


}