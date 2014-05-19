<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/6/14
 * Time: 2:39 PM
 * To change this template use File | Settings | File Templates.
 */

class Crud extends CI_Controller{

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

        if($query = $this->site_model->get_records())
        {
            $data['records'] = $query;
        }

        $this->load->view('options_view', $data);
    }

    function edit($id = null)
    {
        if($query = $this->site_model->get_record_by_id($id))
        {
            $data['records'] = $query;
        }
        else
        {
            echo "<h1>no query</h1>";
        }
        $this->load->view('edit_pages', $data);
    }

    function create()
    {
        $post = $_POST;
        foreach($post as $key => $value){
            $data[$key] =  $value;
        }
        $this->site_model->add_record($data);
        //$this->index(); // redirect user to options_view
    }

    function update($id)
    {
        $data = $_POST;
        $this->site_model->update_record($data, $id);
        $this->edit($id);
    }

    function delete()
    {
        $this->site_model->delete_row();
       // $this->index(); // redirect user to options_view
    }

    function response()
    {
        $headers = array();
        $post = $_POST;
        /**
         * to check if $_POST array is not empty, if so then new entry cannot be added to database
         */
        if(!empty($post))
        {
            $this->create();
        }

        /**
         * read all rows from db_manager table
         */
        if($query = $this->site_model->get_records())
        {
            $headers['records'] = $query;
        }

        /**
         * fill the <select> tag and display it in table field which has 'db_header_results' class name
         */
        echo '<select name="url_db_headers" id="url_db_headers" multiple >ajshjashjash';
        foreach($headers['records'] as $key => $value)
        {
            echo '<option id='.$value->id.' value='.$value->header_title.'>'.$value->header_title.'</option>';
        }
        echo '</select>';

    }// response

    /**
     * accepts uploaded CSV file from URL upload, read information and returns it
     */
    function upload()
    {
        $this->load->view('pages/column_selector');
    } // upload

    function delete_header()
    {
        $headers = array();
        $post = $_POST;

        if(!empty($post))
        {
            $id = $post['id'];
            $this->site_model->delete_row($id);

            /**
             * read all rows from db_manager table after a single header has been deleted
             */
            if($query = $this->site_model->get_records())
            {
                $headers['records'] = $query;
            }

            /**
             * fill the <select> tag and display it in table field which has 'db_header_results' class name
             * after a single header has been deleted
             */
            echo '<select name="url_db_headers" id="url_db_headers" multiple >';
            foreach($headers['records'] as $key => $value)
            {
                echo '<option id='.$value->id.' value='.$value->header_title.'>'.$value->header_title.'</option>';
            }
            echo '</select>';
        }

    }//delete_header

    function edit_headers($id = null)
    {
        $data = $_POST;
        $id = $data['id'];

        if(!empty($data))
        {

            if($query = $this->site_model->get_record_by_id($id))
            {
                $data['records'] = $query;
            }
            else
            {
                echo "<h1>no query</h1>";
            }
            $this->load->view('pages/edit_dbmanager', $data);
        }

    }//edit_headers

    function update_header()
    {
        $data = $_POST;
        $id = $data['id'];

        if(!empty($data))
        {
            $this->site_model->update_record($data, $id);
            $this->edit_headers($id);
        }

    }//update_header
    function get_table_datas()
    {
        $data = $_POST;
        
        
        
        
        
        $this->load->view('pages/edit_dbmanager', $data);
    }//data table
} // class Crud
