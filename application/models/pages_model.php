<?php

class Pages_model extends CI_Model{

    function add_page($data)
    {
        $this->db->insert('permissions', $data);
        return;
    }

    function get_users_by_name($id)
    {
        echo "ID ".$id."<br/>";
        $query = $this->db->get_where('permissions', array('id' => $id));
        return $query->result();
    }


}