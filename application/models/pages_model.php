<?php

class Pages_model extends CI_Model{

    function add_page($data)
    {
        $this->db->insert('permissions', $data);
        return;
    }


}