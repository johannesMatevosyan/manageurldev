<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/6/14
 * Time: 2:39 PM
 * To change this template use File | Settings | File Templates.
 */

class Crud extends CI_Controller{

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
        $this->index(); // redirect user to options_view
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
        echo '<select name="url_db_headers" id="url_db_headers" multiple >';
        foreach($headers['records'] as $key => $value)
        {
            echo '<option value='.$value->header_title.'>'.$value->header_title.'</option>';
        }
        echo '</select>';
    }// response

    /**
     * accepts uploaded CSV file, read information and returns it
     */
    function upload()
    {
        $this->load->view('pages/column_selector');
    } // upload
} // class Crud