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
    //calais http://www.dangrossman.info/open-calais-tags/
    include_once  APPPATH.'libraries/simple_html_dom.php';
    include_once  APPPATH.'libraries/opencalais.php';
    $apikey = "mzcxpd66uyevcektzdpuruqv";
    $oc = new OpenCalais($apikey);
    //end calais
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
            $j=0;
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
                    foreach($data as $key => $value){
                        if($d[$i])
                        {
                        $csv_array[$d[$i]] = $value;                           
                        }
                        $i++;
                    }
                    if(!$this->file_model->get_record_by_header($csv_array['URL']))
                    {
                       //get content by url
                       $domain= parse_url($csv_array['URL']);
                       if (isset($domain['host'])) {
                       $domain['host']=(preg_match("/www/", $domain['host'])) ? $domain['host']:  'www.'.$domain['host'];
                       //$content = strip_tags(file_get_contents('http://'.$domain['host']));
                       $j++;
                       echo $j.'-'.$domain['host'].'<br>';
                       $content = file_get_html('http://'.$domain['host'])->plaintext;
                       if(strlen($content)>100000){
                       $strArr=str_split($content,100000);
                       $content=$strArr[0];
                       }
                       }
                        //analyse content
                       if(isset($content) and !empty($content)){
                                $entities = $oc->getEntities($content);
                                foreach ($entities as $type => $values) {
                                    if($type!='URL' AND in_array($type,$columns)) {
                                        $csv_array[$type]=count($values);
                                    }
                                } 
                       }    
                    $this->file_model->add_record($csv_array);
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