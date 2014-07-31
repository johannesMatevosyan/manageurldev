<?php 
class Analizer
{
	public static $website;

	public static function saveAnalyses()
    {
        include_once  APPPATH.'libraries/simple_html_dom.php';
        include_once  APPPATH.'libraries/opencalais.php';
        
        $oc = new OpenCalais(CALAIS_API_KEY);

        $website = self::$website;

        $content      = self::get_content($website['URL']);
       // $content 	  = 'university';

        $contentType  = "text/txt"; // simple text - try also text/html
        $outputFormat = "text/simple"; // simple output format - try also xml/rdf and text/microformatas

            $restURL   = "http://api.opencalais.com/enlighten/rest/";
            $paramsXML = "<c:params xmlns:c=\"http://s.opencalais.com/1/pred/\" " . 
            "xmlns:rdf=\"http://www.w3.org/1999/02/22-rdf-syntax-ns#\"> " .
            "<c:processingDirectives c:contentType=\"".$contentType."\" " .
            "c:outputFormat=\"".$outputFormat."\"".
            "></c:processingDirectives> " .
            "<c:userDirectives c:allowDistribution=\"false\" " .
            "c:allowSearch=\"false\" c:externalID=\" \" " .
            "c:submitter=\"Calais REST Sample\"></c:userDirectives> " .
            "<c:externalMetadata><c:Caller>Calais REST Sample</c:Caller>" .
            "</c:externalMetadata></c:params>";
                // Construct the POST data string
                $data = "licenseID=".urlencode(CALAIS_API_KEY);
                $data .= "&paramsXML=".urlencode($paramsXML);
                $data .= "&content=".urlencode($content); 

                // Invoke the Web service via HTTP POST
                 $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $restURL);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                $response = curl_exec($ch);
                curl_close($ch);

                $simple_level = 0;
                $simple_is_parse_err = false;
                $simple_l1_tag = null;
                $element = null;

                $xmlp = xml_parser_create();
                xml_parser_set_option($xmlp, XML_OPTION_CASE_FOLDING, 0);
                xml_parser_set_option($xmlp, XML_OPTION_SKIP_WHITE, 0);
                xml_set_element_handler($xmlp, "Analizer::simple_start", "Analizer::simple_stop");
                xml_set_character_data_handler($xmlp, "Analizer::simple_char");
                if (xml_parse($xmlp, $response, 1) == 0)
                {
                    echo "Parse error";
                }
                xml_parser_free($xmlp);
    }

	public static function get_content($url)
	{ 
           $domain = parse_url($url);
           if (isset($domain['host']))
           {
               $domain['host']=(preg_match("/www/", $domain['host'])) ? $domain['host']:  'www.'.$domain['host'];
               $content = file_get_html('http://'.$domain['host'])->plaintext;
               if(strlen($content)>100000)
               {
                   $strArr=str_split($content,100000);
                   $content=$strArr[0];
               }

               return ( isset($content) and !empty($content)) ? $content : FALSE;
           }
           else
           {
               return FALSE;
           }
                   
    }//get_content

	static function simple_start($parser, $element_name, $element_atts) 
	{
	    global $simple_level;
	    global $simple_is_parse_err;
	    global $simple_l1_tag;
	    global $element;

	    if ($simple_is_parse_err)
	    {
	        return;
	    }

	    if ($simple_level == 0)
	    {
	        /*
	         * Level 0 - the OpenCalaisSimple tag
	         */
	        if ($element_name != "OpenCalaisSimple")
	        {
	            $simple_is_parse_err = true;
	            return;     
	        }
	    }
	    else if ($simple_level == 1)
	    {
	        /*
	         * Level 2 - Description or CalaisSimpleOutputFormat
	         */
	        if ($element_name != "Description" && 
	            $element_name != "CalaisSimpleOutputFormat")
	        {
	            $simple_is_parse_err = true;
	            return;     
	        }
	        
	        $simple_l1_tag = $element_name;
	    }
	    else if ($simple_level > 1)
	    {
	        /*
	         * Level 2+ - Description information or semantic data
	         */
	        if ($simple_l1_tag == "Description")
	        {
	            /*
	             * Information under the Description element - place
	             * in info array - not presented
	             */
	        }
	        else if ($simple_l1_tag == "CalaisSimpleOutputFormat")
	        {
	            /*
	             * Information under the CalaisSimpleOutputFormat - 
	             * displayed
	             */
	            $element = array("type" => $element_name,
	                            "name" => "",
	                            "repeat" => 0);
	                                 
	            foreach ($element_atts as $name => $value)
	            {
	                if ($name == "count")
	                {
	                    $element["repeat"] = (integer)$value; 
	                }
	            }    
	        }
	    }
	    
	    $simple_level++;
	    
	}

	static function simple_stop($parser, $element_name) 
	{

	    global $simple_level;
	    global $simple_is_parse_err;
	    global $simple_l1_tag;
	    global $element;

	    $website = self::$website;

	    if ($simple_is_parse_err)
	    {
	        return;
	    }
	    
	    if ($simple_level == 0)
	    {
	        $simple_is_parse_err = true;
	        return;     
	    }
	    
	    if ($simple_level == 1)
	    {
	        /*
	         * Level 0 - closing the OpenCalaisSimple tag
	         */
	        if ($element_name != "OpenCalaisSimple")
	        {
	            $simple_is_parse_err = true;
	            return;     
	        }
	    }
	    else if ($simple_level == 2)
	    {
	        /*
	         * Level 1 - closing Description or CalaisSimpleOutputFormat
	         */
	        if ($element_name != "Description" && 
	            $element_name != "CalaisSimpleOutputFormat")
	        {
	            $simple_is_parse_err = true;
	            return;     
	        }
	        
	        $simple_l1_tag = "";
	    }
	    else if ($simple_level == 3)
	    {
	        /*
	         * Level 2 - if under CalaisSimpleOutputFormat - closing an
	         * entity or event - Display it now
	         */
	        if ($simple_l1_tag == "CalaisSimpleOutputFormat")
	        {
	        	$category = new category_model;
	        	$analyses = new analys_result_model();
	        	
	        	$category->categoryName = $element["type"];
	        	$category->checkCategory();

	        	$analyses->categoryId = $category->getCategoryIDByCategoryName();
	        	$analyses->websiteId  = $website ['id'];
	        	$analyses->keywords   = $element["name"];
	        	$analyses->count 	  = $element["repeat"];
	        	$analyses->addAnalises();
	        } 
	    }

	    $simple_level--;
	}

	static function simple_char($parser, $data) {
  
	    global $simple_level;
	    global $simple_is_parse_err;
	    global $simple_l1_tag;
	    global $element;

	    if ($simple_is_parse_err)
	    {
	        return;
	    }   
	    
	    /*
	     * Data within <tag> </tag> - set the name of the current element
	     */
	    if ($simple_l1_tag == "CalaisSimpleOutputFormat" && $simple_level == 3)
	    {
	        $element["name"] .= trim($data);
	    }
	}
}
?>