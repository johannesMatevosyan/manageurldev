<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *************************************************
 ** File: login.php  **
 ** Date: 03.05.2014     **
 ** Time: 2:06 PM    **
 ** @author Hovhannes Matevosyan **
 ** Description:  **
 *************************************************
 */

class Site extends CI_Controller{

    /**
     * Constructor checks if the user was authorized with the help of is_logged_in(),
     * otherwise access is denied
     */
    function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
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
            echo '<div style="width: 600px; margin: 20px auto;"> ';
            echo '<h2>You don\'t have permission to access this page</h2>';
            echo anchor('login', 'Login Now');
            echo '</div>';
            die();
        }
    }

    /**
     * to redirect successfully registered users into members_area page.
     */
    function members_area()
    {
        $this->load->view('members_area');
    }

    /**
     * to redirect successfully registered users into statistics page.
     */
    function statistics()
    {
        $data['main_content'] = 'pages/content';
        if(!empty($_GET['current'])) $data['current'] = $_GET['current'];
        $this->load->view('includes/template', $data);
    }

    /**
     * to redirect successfully registered users into dbmanager page.
     */
    function dbmanager()
    {
        $data['main_content'] = 'pages/dbmanager';
        $this->load->view('includes/template', $data);
    }

}