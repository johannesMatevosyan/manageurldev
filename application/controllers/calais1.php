<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 set_time_limit (5000);
class Calais1 extends CI_Controller {
public function index()
{
    include_once  APPPATH.'libraries/simple_html_dom.php';
    include_once  APPPATH.'libraries/opencalais.php';
    $apikey = "mzcxpd66uyevcektzdpuruqv";
    $oc = new OpenCalais($apikey);
    // function
    function goo($content,$oc){
           
            $entities = $oc->getEntities($content);
            foreach ($entities as $type => $values) {
                    
                    echo "<b>" . $type . "</b>";
                    echo "<ul>";
                    $i=0;
                    foreach ($values as $entity) {
                            $i++;
                            echo "<li>" . $entity . "</li>";
                    }
                    echo "<li> Repeated:" . $i . "</li>";
                    echo "</ul>";

            }            
     }
    if($query = $this->file_model->get_records())
{   
     
    $i=0;
    foreach($query as $v){
               $i++;
               $domain= parse_url($v->URL);
               if (isset($domain['host'])) {
                   
                   
                $domain['host']=(preg_match("/www/", $domain['host'])) ? $domain['host']:  'www.'.$domain['host'];
                //$content = strip_tags(file_get_contents('http://'.$domain['host']));
                $content = file_get_html('http://'.$domain['host'])->plaintext;
                if(strlen($content)>100000){
                $strArr=str_split($content,100000);
                $content=$strArr[0];
                 }
                 echo $i.'-'; echo $domain['host'],"<hr>";
                if(isset($content) and !empty($content))  goo($content,$oc);
                
               }                                  
               }
}
    
}
}