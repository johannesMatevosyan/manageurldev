<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *************************************************
 ** File: login.php  **
 ** Date: 22.05.2014     **
 ** Time: 12:31 PM    **
 ** @author Hovhannes Matevosyan **
 ** Description: Display view for blocked users **
 *************************************************
 */

class Block extends CI_Controller{

    function index()
    {
        /** Display view for blocked users */
        $this->load->view('includes/login-header');
        $this->load->view('block_user');
        $this->load->view('includes/footer');
    }//index

}