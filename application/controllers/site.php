<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/3/14
 * Time: 2:06 PM
 * To change this template use File | Settings | File Templates.
 */

class Site extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
    }

    /**
     * to redirect successfully registered users into members_area page
     */
    function members_area()
    {
        $this->load->view('members_area');
    }

    function is_logged_in()
    {
        // to have access, user should have a session
        $is_logged_in = $this->session->userdata('is_logged_in');

        /**
         * if information is not retrieved from session,
         * then user is has no permission to be in this page
         */
        if(!isset($is_logged_in) || $is_logged_in != true)
        {
            echo '<h2>You don\'t have permission to access this page</h2>';
            echo anchor('login', 'Login Now');
            die();
        }
    }

    /**
     * to redirect successfully registered users into statistics page
     */
    function statistics()
    {
        $data['main_content'] = 'pages/content';
        $this->load->view('includes/template', $data);
       // $this->load->view('statistics');
    }

    function dbmanager()
    {
        $data['main_content'] = 'pages/dbmanager';
        $this->load->view('includes/template', $data);
        // $this->load->view('statistics');
    }

}