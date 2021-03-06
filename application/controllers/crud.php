<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *************************************************
 ** File: login.php  **
 ** Date: 12.05.2014     **
 ** Time: 12:31 PM    **
 ** @author Hovhannes Matevosyan **
 ** Description: Perform Create, Read, Update and Delete operations with database **
 *************************************************
 */
class Crud extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
    }

    function is_logged_in()
    {
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
    }//index

    function edit($id = null)
    {

        if($this->session->userdata('type') == 'viewer')
        {
            echo "<script> document.location.href = '".base_url()."block'; </script>";
            exit;
        }

        if($query = $this->site_model->get_record_by_id($id))
        {
            $data['records'] = $query;
        }
        else
        {
            echo "<h1>No query</h1>";
        }
        $this->load->view('edit_pages', $data);
    }//edit

    function create()
    {

        if($this->session->userdata('type') == 'viewer')
        {
            echo "<script> document.location.href = '".base_url()."block'; </script>";
            exit;
        }

        $post = $_POST;
        foreach($post as $key => $value){
            $data[$key] =  $value;
        }
        $this->site_model->add_record($data);
    }//create

    function update($id)
    {

        if($this->session->userdata('type') == 'viewer')
        {
            echo "<script> document.location.href = '".base_url()."block'; </script>";
            exit;
        }

        $data = $_POST;
        $this->site_model->update_record($data, $id);
        $this->edit($id);
    }//update

    function delete()
    {

        if($this->session->userdata('type') == 'viewer')
        {
            echo "<script> document.location.href = '".base_url()."block'; </script>";
            exit;
        }

        $this->site_model->delete_row();
    }//delete

    function ajax_get_headers()
    {
        $headers = array();
        $headers['records'] = $this->site_model->get_columns();
            
        /**
         * fill the <select> tag and display it in table field which has 'db_header_results' class name
         */
        //echo '<select name="url_db_headers" id="url_db_headers" multiple >';
        foreach($headers['records'] as $value)
        {
            echo '<option class="zazaa" value='.$value.' >'.$value.'</option>';
        }
        //echo '</select>';

    }// ajax_get_headers

    function ajax_set_headers()
    {
        $headers = array();
        $post = $_POST;

        if($this->session->userdata('type') == 'viewer') exit;

        /**
         * to check if $_POST array is not empty, if so then new entry cannot be added to database
         */
        if(!empty($post))
        {

            if (in_array($post['header_title'], $this->site_model->get_columns()))
            {
                echo "<script>alert('Header with the same name already exists. Please choose another name...');</script>";
            }
            else
            {
               $this->site_model->add_column($post['header_title']);
               $this->create();
            }
        }

    }// ajax_set_headers

    /**
     * accepts uploaded CSV file from URL upload, read information and returns it
     */
    function upload()
    {
        $this->load->view('pages/column_selector');
    } // upload

    function delete_header()
    {

        if($this->session->userdata('type') == 'viewer') exit;

        $post = $_POST;
        if(!empty($post))
        {
            $this->site_model->delete_column($post['delete_header']);
            $this->site_model->delete_row_by_header_title($post['delete_header']);
        }
    }//delete_header

    function ajax_edit_headers()
    {

        if($this->session->userdata('type') == 'viewer')
        {
            echo "<script> document.location.href = '".base_url()."block'; </script>";
            exit;
        }

        $data = $_POST;
        if(!empty($data))
        {
            if($query = $this->site_model->get_record_by_header($data['header_title']))
            {
                $d = array();
                $d['records'] = $query;
            }
            else
            {
                echo "<h1>no query</h1>";
            }
            $this->load->view('pages/edit_dbmanager', $d);
        }
    }//ajax_edit_headers

    function update_header()
    {
        if($this->session->userdata('type') == 'viewer')
        {
            echo "<script> document.location.href = '".base_url()."block'; </script>";
            exit;
        }

        $data = $_POST;
        $id = $data['id'];
        if(!empty($data))
        {
            $this->site_model->edite_column($data);
            unset($data['old_header']);
            $this->site_model->update_record($data, $id);
            $this->ajax_edit_headers($id);
        }
    }//update_header

    /**
     *  get the values for URL Preview page
     */
    function get_table_datas()
    {
        $data = array();
        if($query = $this->file_model->get_records())
        {
            $data['records'] = $query;
        }

       $this->load->view('pages/data_table',$data);

    }//get_table_datas


} // class Crud
