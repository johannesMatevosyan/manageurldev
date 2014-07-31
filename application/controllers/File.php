<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//set_time_limit (5000);

/**
 *************************************************
 ** File: login.php  **
 ** Date: 21.05.2014     **
 ** Time: 6:56 PM    **
 ** @author Hovhannes Matevosyan **
 ** Description: This controller is assigned for 'URL Upload' page,
 **             it sends contents of csv file to database *
 *************************************************
 */


class File extends CI_Controller {

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
         *
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

    function send_csv_data()
    {

        $this->load->model('category_model');
        $this->load->model('analys_result_model');
        $this->load->helper('analizer');
        /**
         * var @first_id: gets the last id number from 'excel' table
         *                and puts it in 'first_id' field of a 'store_id' table
         *                when the .csv file is uploaded
         */

        if($first_id = $this->file_model->get_last_id()) // get last id from 'excel' table
        {
            /**
            *  add 1 to a value of the last number,
            *  since 'first_id' field should be bigger than 'last_id' field of previous uploaded file.
            */
            $data['first_id'] = $first_id + 1;
        }
        else
        {
            $data['first_id'] = 1;
        }
        /**
         * $data['insert_time']: gets the current time and date
         *                       and puts it in 'insert_time' file of a table
         *                       when the .csv file is uploaded
         */

        $data['insert_time'] = 'NOW()';

        /**
         * var @file_name: gets the name of uploaded file
         *                 and puts it in 'file_name' field of a table
         */

        $file_name = $_GET['file'];

        $pure_name_plus = strstr($file_name, "---");

        $data['file_name'] = substr($pure_name_plus, 3);

        /**
         * Insert query to 'store_id' table
         */

        $this->download_model->add_record($data);


        /**
         * to check if $_POST array is not empty, if so then new entry cannot be added to database
         */
        if(!empty($file_name))
        {
            $d = array();
            $path = base_url()."assets/upload/".$file_name;

            $read_csv_file = (fopen($path, "r")); // to read only first line of a .CSV file

            $line = 0;
            $csv_array = array();
            $columns = $this->site_model->get_columns();
            while(!feof($read_csv_file)){
                $data = fgetcsv($read_csv_file);
                if($line == 0)
                {
                    foreach($data as $value){
                        if(in_array($value, $columns))
                        {               
                            $d[] = $value;
                        } else {
                            $d[] = false;
                        }
                    }
                }
                else
                {
                    $i = 0;
                    foreach ($data as $value) {
                        if ($d[$i]) {
                            $csv_array[$d[$i]] = $value;
                        }
                        $i++;
                    }

                    if(!$row = $this->file_model->get_record_by_header($csv_array['URL']) )
                    {
                        $this->file_model->add_record($csv_array);
                    }
                    elseif(isset($_GET['update']) && $_GET['update'] == 1)
                    {
                        $this->file_model->update_record($row[0]->id, $csv_array);
                    }
                    $website = $this->file_model->get_website_id(@$csv_array['URL']);
                    if ($website) {
                        Analizer::$website = $website[0];
                        Analizer::saveAnalyses();
                    }
                }

                 $line++;

            }// while

            /**
             * var @last_id: gets the last id number from 'excel' table
             *               and puts it in 'first_id' field of a 'store_id' table
             *               AFTER .csv file is uploaded
             *
             * var @id:   get the last id from 'store_id' table,
             *            to be able to update that table
             */

            $last_id = $this->file_model->get_last_id();

            $updateQuery = "UPDATE `store_id` SET last_id = ".($last_id + 1)." ORDER BY `id` DESC LIMIT 1";
            $this->db->query($updateQuery);
        }
        else
        {
            echo "Empty!!";
        }

    }//send_csv_data

    /**
     *  File: url_preview.php
     *  Description: edit selected cell in the table
     */
    function edit_cell(){
        $post=$_POST;
        $id=$post['id'];
        unset($post['old_url']);
        $this->file_model->update_record($id,$post);
        redirect('?current=url_preview');
    }

    /**
     *  domain_sum() function Permits you to determine the number of rows in a 'excel' table.
     */
    function domain_sum()
    {
        $csv_last = $this->file_model->get_domain_sum();
        echo $csv_last;
    } //domain_sum


    /**
     *  new_domains() function calculates and shows the number of new domains added.
     */
    function new_domains()
    {
        if($query = $this->download_model->get_store_records())
        {
            foreach($query as $key =>$value)
            {
                $new_domains = $value->last_id - $value->first_id;
                echo " <tr class='new_domains'><td>".$new_domains." new domains added - ".$value->insert_time."</td></tr>
                       <tr><td>------------------------------------------------------------------</td></tr>";
                echo '<script>
                         $("#copy_logs").click( function() {
                            $.ajax({
                                success: copies
                            });
                        });
                      </script>';

            }
        }
        else
        {
            echo "<h1>no query</h1>";
        }

    }//new_domains

}