<?php

class Site_model extends CI_Model{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->dbforge();
    }

    function add_column($name)
    {
        $query = 'Alter table `excel` ADD `'.$name.'` varchar(250) ';
        $this->db->query($query);
    }

    function get_columns()
    {
        return $this->db->list_fields('excel');
    }

    function delete_column($name)
    {
        $this->dbforge->drop_column('excel', $name);
    }

    function get_record_by_id($id)
    {
        $query = $this->db->get_where('db_manager', array('id' => $id));
        return $query->result();
    }

    function edite_column($data)
    {
        $fields = array($data['old_header'] => array(
                            'name' => $data['header_title'],
                            'type' => 'varchar(250)', ),
                       );
       $this->dbforge->modify_column('excel', $fields);
    }

    function add_record($data)
    {
        $this->db->insert('db_manager', $data);
    }

    function update_record($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('db_manager', $data);
    }

    function delete_row($id)
    {
        /** figure out deleted id, segment(3) = controller/method/id */
        $this->db->where('id', $id);
        $this->db->delete('db_manager');
    }

    function delete_row_by_header_title($name)
    {
        /** figure out deleted id, segment(3) = controller/method/id */
        $this->db->where('header_title', $name);
        $this->db->delete('db_manager');
    }

    function get_record_by_header($id)
    {
        $query = $this->db->get_where('db_manager', array('header_title' => $id));
        return $query->result();
    }

    function db_manager_joined_with_data()
    {
        $this->db->select('*');
        $this->db->from('db_manager');
        $this->db->join('data', 'db_manager.id = data.header_id');
        return $this->db->get();
    }

}