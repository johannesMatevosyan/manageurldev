<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Block extends CI_Controller{

    function index()
    {
        $data = array();
        if($query = $this->site_model->get_records())
        {
            $data['records'] = $query;
        }
        $this->load->view('block_user', $data);
    }

}