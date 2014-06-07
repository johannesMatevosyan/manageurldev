<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
set_time_limit (5000);
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
        function get_content($url){ 
                       $domain= parse_url($url);
                       if (isset($domain['host'])) {
                           $domain['host']=(preg_match("/www/", $domain['host'])) ? $domain['host']:  'www.'.$domain['host'];                           
                           $content = file_get_html('http://'.$domain['host'])->plaintext;                           
                           if(strlen($content)>100000){
                           $strArr=str_split($content,100000);
                           $content=$strArr[0];                         
                           }
                           return ( isset($content) and !empty($content)) ? $content : FALSE;
                       }
                       else {
                           return FALSE;                           
                       }
                       
        }
        //calais http://www.dangrossman.info/open-calais-tags/
        include_once  APPPATH.'libraries/simple_html_dom.php';
        include_once  APPPATH.'libraries/opencalais.php';
        $apikey = "mzcxpd66uyevcektzdpuruqv";
        $oc = new OpenCalais($apikey);
        //end calais

        /**
         * var @first_id: gets the last id number from 'excel' table
         *                and puts it in 'first_id' field of a 'store_id' table
         *                when the .csv file is uploaded
         */

        if($first_id = $this->file_model->get_last_id()) // get last id from 'excel' table
        {
            /**
            *  add 1 to a value of the last number,
             * since 'first_id' field should be bigger than 'last_id' field of previous uploaded file.
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

        $data['insert_time'] = date('Y-m-d H:i:s');

        /**
         * var @file_name: gets the name of uploaded file
         *                 and puts it in 'file_name' file of a table
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
            $path = "assets/upload/".$file_name;

            $read_csv_file = (fopen($path, "r")); // to read only first line of a .CSV file

            $line = 0;
            $csv_array = array();
            $columns=$this->site_model->get_columns();
            while(!feof($read_csv_file)){

                $data = fgetcsv($read_csv_file);
                if($line == 0)
                {
                    foreach($data as $value){
                        if(in_array($value, $columns))
                        {               
                            $d[] = $value;
                        }else{
                            $d[] = false;
                        }
                    }
                }
                else
                {
                    $i = 0;
                    foreach($data as $value){
                        if($d[$i])
                        {
                        $csv_array[$d[$i]] = $value;                           
                        }
                        $i++;
                    }

                       //get content by url
                       $content=get_content($csv_array['URL']);
                       
                        //analyse content
                       if(isset($content) and !empty($content)){
                            $entities = $oc->getEntities($content);
                            foreach ($entities as $type => $values) {
                                if($type!='URL' AND in_array($type,$columns)) {
                                    $csv_array[$type]=count($values);
                                }
                            }
                       }

                    if(!$row = $this->file_model->get_record_by_header($csv_array['URL']) )
                    {
                        $this->file_model->add_record($csv_array);
                    }
                    elseif($_GET['update']=='true')
                    {
                        $_GET['update'];$this->file_model->update_record($row[0]->id,$csv_array);                       
                    }
                }

                 $line++;
            }// while

            /**
             * var @last_id: gets the last id number from 'excel' table
             *               and puts it in 'first_id' field of a 'store_id' table
             *               AFTER .csv file is uploaded
             *
             * var @id: get the last id from 'store_id' table,
             *          to be able to update that table
             */

            $last_id = $this->file_model->get_last_id();

            $id = $this->download_model->get_last_id();

            $url_download['last_id'] = $last_id;
            $this->download_model->update_record($id, $url_download);

        }
        else
        {
            echo "Empty!!";
        }

    }
    function edit_cell(){
        $post=$_POST;
        $id=$post['id'];
        unset($post['old_url']);
        $this->file_model->update_record($id,$post);
        redirect('?current=url_preview');
    }

}