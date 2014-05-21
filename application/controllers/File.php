<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/21/14
 * Time: 6:56 PM
 * To change this template use File | Settings | File Templates.
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

    function send_csv_data(){

        $file_name = $_GET['file'];

        /**
         * to check if $_POST array is not empty, if so then new entry cannot be added to database
         */
        if(!empty($file_name))
        {
            $d = array();
            $path = "assets/upload/".$file_name;

            $read_csv_file = (fopen($path, "r")); // to read only first line of a .CSV file

            $line = 0;
            $csv_array = array();

            while(!feof($read_csv_file)){

                $data = fgetcsv($read_csv_file);
                if($line == 0)
                {
                    foreach($data as $value){

                        if($query = $this->site_model->get_record_by_header($value))
                        {
                            $d[] = $query[0]->id;
                        }
                        else
                        {
                            $d[] = $value;
                        }
                    }
                    echo '<hr/>';
                }
                else
                {
                    $i = 0;
                    foreach($data as $key => $value){

                        $csv_array['header_id'] = $d[$i];
                        $csv_array['text'] = $value;

                        $this->file_model->add_record($csv_array);
                        $i++;
                    }
                }

                 $line++;
            }

        }
        else
        {
            echo "Empty!!";
        }

    }

}