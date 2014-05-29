<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/6/14
 * Time: 2:39 PM
 * To change this template use File | Settings | File Templates.
 */

class Members extends CI_Controller{

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


    function index()
    {
        $data = array();

        if($query = $this->members_model->get_members())
        {
            $data['records'] = $query;

            echo '<select name="manageUsers" id="manageUsers" multiple>';
            foreach($data['records'] as $key => $value)
            {
                echo '<option class="selectUser" id='.$value->id.' value='.$value->first_name.' >'.$value->first_name.'</option>';
            }
            echo '</select>';
        }

    }


    function set_permission()
    {
        /**
         * to check if $_POST array is not empty, if so then new entry cannot be added to database
         */
        if(!empty($_POST))
        {
            $user_data = array();
            $user_data['username'] = $_POST['username'];
            $user_data['email_address'] = $_POST['email_address'];
            $user_data['password'] = $_POST['password'];

            $this->members_model->members_model->add_member($user_data);

            $page_data = array();
            $page_data['statistics'] = $_POST['statistics'];
            $page_data['dbmanager'] = $_POST['dbmanager'];
            $page_data['url_preview'] = $_POST['url_preview'];
            $page_data['url_upload'] = $_POST['url_upload'];
            $page_data['url_download'] = $_POST['url_download'];

            $this->members_model->pages_model->add_page($page_data);

        }

    }// response

}