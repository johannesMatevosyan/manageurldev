<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *************************************************
 ** File: login.php  **
 ** Date: 03.05.2014     **
 ** Time: 7:22 PM    **
 ** @author Hovhannes Matevosyan **
 ** Description: This controller is assigned for 'Users management' page and for registration.
 **              it creates new users and gives roles and permissions for the, **
 *************************************************
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
                echo '<option class="selectUser" id='.$value->id.' value='.$value->username.' >'.$value->username.'</option>';
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
            $user_data['password'] = md5($_POST['password']);

            $this->members_model->members_model->add_member($user_data);

            $page_data = array();
            $page_data['username'] = $_POST['username'];
            $page_data['pagename'] = 'statistics';
            $page_data['type'] = $_POST['statistics'];

            $this->members_model->pages_model->add_page($page_data);

            $page_data['username'] = $_POST['username'];
            $page_data['pagename'] = 'dbmanager';
            $page_data['type'] = $_POST['dbmanager'];

            $this->members_model->pages_model->add_page($page_data);

            $page_data['username'] = $_POST['username'];
            $page_data['pagename'] = 'url_preview';
            $page_data['type'] = $_POST['url_preview'];

            $this->members_model->pages_model->add_page($page_data);

            $page_data['username'] = $_POST['username'];
            $page_data['pagename'] = 'url_upload';
            $page_data['type'] = $_POST['url_upload'];

            $this->members_model->pages_model->add_page($page_data);

            $page_data['username'] = $_POST['username'];
            $page_data['pagename'] = 'url_download';
            $page_data['type'] = $_POST['url_download'];

            $this->members_model->pages_model->add_page($page_data);

        }

    }// response

    function ajax_edit_permissions()
    {
        $user = $_POST;
        $user_records = array();
        if(!empty($user))
        {
            if($query = $this->pages_model->get_users_by_name($user['username']))
            {
                $user_records['records'] = $query;
            }
            if ($query2 = $this->members_model->get_record_by_username($user['username']))
            {   
                $user_records['user'] = $query2;
            }
            else
            {
                echo "<h1>no query</h1>";
            }
            $this->load->view('pages/edit_permissions', $user_records);
        }
    }//edit_headers

    function set_edit_permission()
    {
        foreach ($_POST  as $k =>$value ) {             
            if(is_array($value)){
                if($value['pagename']){
                    $page_data['pagename'] = $value['pagename'];
                    if($value['type']) $page_data['type'] = $value['type'];
                    $user_data['username'] = $_POST['username'];
                    $this->pages_model->update_page($k,$page_data);
                }
            }
        }
            $user_data = array();
            $user_data['username'] = $_POST['username'];
            $user_data['email_address'] = $_POST['email_address'];
            $user_data['password'] = md5($_POST['password']);
            $this->members_model->members_model->update_member($user_data['username'],$user_data);
            redirect('?current=user_management');
    }

}