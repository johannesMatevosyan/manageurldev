<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/21/14
 * Time: 6:58 PM
 * To change this template use File | Settings | File Templates.
 */

class File_model extends CI_Model {

    function add_record($data)
    {
        $this->db->insert('data', $data);
    }
}