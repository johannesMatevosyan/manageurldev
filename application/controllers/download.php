<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *************************************************
 ** File: login.php  **
 ** Date: 06.05.2014     **
 ** Time: 6:08 PM    **
 ** @author Hovhannes Matevosyan **
 ** Description: This controller is assigned for 'URL Download' page,
 **              it creates a csv file on a fly and provides downloading**
 *************************************************
 */

class Download extends CI_Controller{

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
        if($query = $this->download_model->get_store_records())
        {
            $data['records'] = $query;
        }
        $this->load->view('pages/url_download', $data);
    }//index

    function get_files()
    {
        $data = array();
        if($query = $this->download_model->get_store_records())
        {
            $data['records'] = $query;
        }

        foreach($data['records'] as $value)
        {   echo '<tr>';
            echo '<td class="id-'.$value->id.'">'.$value->id.'</td>';
            echo '<td>'.$value->insert_time.'</td>';
            echo '<td>'.$value->file_name.'</td>';
            echo '<td><a href="'.base_url().'download/plaintext?file='.$value->file_name.'&firstid='.$value->first_id.'&lastid='.$value->last_id.'" id="download_files" class="download_file">Download</a></td>';
            echo '</tr>';
        }

        echo '<script> var file_name = "'.$value->file_name.'"; var file_id = "'.$value->id.'"</script>';

    }//get_files


    function plaintext() {

        $file = $_GET;

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename='.$file['file'].'');

        /** create a file pointer connected to the output stream **/
        $output = fopen('php://output', 'w');

        /** get header names for a csv file from 'excel' table **/
        $headers = $this->site_model->get_columns();
        /** output the column headings */
        fputcsv($output, $headers);

        /** get rows for a csv file from 'excel' table **/
        $content = $this->file_model->get_records();

        foreach($content as $line)
        {

            $csv_line = (array)$line;

            if($csv_line['id'] >= $file['firstid'] && $csv_line['id'] <= $file['lastid'])
            {
                fputcsv($output, $csv_line);
            }

        }

    }//plaintext

    function selectional_download(){
        $post = $_POST;
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename='.($post['filename']?: "list").'.csv');

        // create a file pointer connected to the output stream
        $output = fopen('php://output', 'w');

        $headers = $this->site_model->get_columns();
        // output the column headings
        fputcsv($output, $headers);
        if ($post['id']=='all') {
            $content = $this->file_model->get_records();
            foreach($content as $line)
            {
                $a=(array)$line;
                fputcsv($output, $a);
            }
        } 
        elseif (is_array($post['id'])){    
            foreach($post['id'] as $id)
            {
                $content = $this->file_model->get_record($id);
                $a=(array)$content[0];
                fputcsv($output, $a);
            }
        }
    } //selectional_download


    /**
     *  save_logs() function stores the number of new domains into txt file.
     */
    function save_logs(){

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=statistics.txt');

        /** create a file pointer connected to the output stream **/
        $output = fopen('php://output', 'w');

        /** get header names for a csv file from 'excel' table **/
        // $headers = $this->site_model->get_columns();
        // $headers = array('');
        /** output the column headings */
        //fwrite($output, $headers);

        /** get rows for a csv file from 'excel' table **/
        $content = $this->download_model->get_store_records();
        $num = 1;
        foreach($content as $key =>$value)
        {
            // $csv_line = (array)$value;
            $new_domains = $value->last_id - $value->first_id;
            $saved_lines = "\r\n".$num++.".  ".$new_domains." news domains added - ".$value->insert_time."\r\n";
            fwrite($output, $saved_lines);
        }

    }//save_logs


}