<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/3/14
 * Time: 1:36 PM
 * To change this template use File | Settings | File Templates.
 */

class Membership_model extends CI_Model{

    /**
     * Access database, find membership table
     * and compare existing username and password fields
     * with values that are sent via log in form
     */
    function validate()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get('membership');

        if($query->num_rows == 1)
        {
            return true;
        }
    }

    /**
     * Insert query with user's info into database,
     * this function will work if the validation is passed
     */
    function create_member()
    {
        $insert_new_member = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email_address' => $this->input->post('email_address'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );

        $insert = $this->db->insert('membership', $insert_new_member);
        return $insert;
    }

    function get_row($name)
    {  echo $name; exit;
        $this->db->where('username', $name);
        $query = $this->db->get('membership');
        return $query->result();
    }

}