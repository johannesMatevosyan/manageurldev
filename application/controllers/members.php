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
        //$query = $this->members_model->get_members();

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


    function response_members()
    {
        $headers = array();
        $post = $_POST;
        /**
         * to check if $_POST array is not empty, if so then new entry cannot be added to database
         */
        if(!empty($post))
        {
            if(!$this->members_model->get_members($post['first_name']))
            {
                $this->create();
            }
            else
            {
                echo "<script>alert('Header with the same name already exists. Please choose another name...');</script>";
            }
        }

        /**
         * read all rows from db_manager table
         */
        if($query = $this->members_model->get_members())
        {
            print_r($query);
            $headers['records'] = $query;
        }

        /**
         * fill the <select> tag and display it in table field which has 'db_header_results' class name
         */
        echo '<select name="manageUsers" id="manageUsers" multiple>';
        foreach($headers['records'] as $key => $value)
        {
            echo '<option class="selectUser" id='.$value->id.' value='.$value->first_name.' >'.$value->first_name.'</option>';
        }
        echo '</select>';

    }// response

}