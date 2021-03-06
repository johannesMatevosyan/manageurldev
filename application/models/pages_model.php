<?php

class Pages_model extends CI_Model{

    function __construct()
    {
         parent::__construct();
    }

    function add_page($data)
    {
        $this->db->insert('permissions', $data);
    }

    function get_users_by_name($name)
    {
        $query = $this->db->get_where('permissions', array('username' => $name));
        return $query->result();
    }

    function update_page($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('permissions', $data);
    }

    function get_perm_type($name)
    {
        $query = $this->db->get_where('permissions', array('username' => $name));
        return $query->result();
    }
}