<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Block extends CI_Controller{

    function index()
    {
        /** Display view for blocked usere */
        $this->load->view('includes/login-header');
        $this->load->view('block_user');
        $this->load->view('includes/footer');
    }//index

}