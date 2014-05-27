<?php
/*
 * Copyright (c) 2008, ClearForest Ltd.
 * 
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without 
 * modification, are permitted provided that the following conditions 
 * are met:
 * 
 * 		- 	Redistributions of source code must retain the above 
 * 			copyright notice, this list of conditions and the 
 * 			following disclaimer.
 * 
 * 		- 	Redistributions in binary form must reproduce the above 
 * 			copyright notice, this list of conditions and the 
 * 			following disclaimer in the documentation and/or other 
 * 			materials provided with the distribution. 
 * 
 * 		- 	Neither the name of ClearForest Ltd. nor the names of 
 * 			its contributors may be used to endorse or promote 
 * 			products derived from this software without specific prior 
 * 			written permission. 
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS 
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT 
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS 
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE 
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, 
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; 
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER 
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, 
 * STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) 
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF 
 * ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 * 
 * Calais REST Interface sample
 * 
 * This class invokes the OpenCalais REST interface via HTTP POST
 * 
 */

// Your license key (obatined from api.opencalais.com)
//$apiKey = "your-api-key-goes-here";
$apiKey = "mzcxpd66uyevcektzdpuruqv";

// Content and input/output formats
//$content = "Microsoft has made several bids to purchase Ford!";

$content = "<h2>h.matevosyan@yahoo.com</h2> h.matevosyan@yahoo.com AMMAN (Reuters) - Atop the hill of Tel Ahmar just a few <h3>kilometers</h3> from Israeli forces on the Golan Heights, Syrian Islamist fighters hoist the al Qaeda flag and praise their mentor Osama bin Laden.
One of the men, a leader of al Qaeda's Nusra Front, compares their battlefield - a lush agricultural region where dead soldiers lie on the ground near a charred Soviet-era tank - with the struggle their comrades waged years ago in Afghanistan.
'This view reminds us of the lion of the mujahideen, Osama bin Laden, on the mountains of Tora Bora,' he can be heard saying in a video posted by the group, which shows the fighters in sight of Israeli jeeps patrolling the fortified frontier.
Last month's capture of the post was followed days later by the seizure of the Syrian army's 61 Infantry Brigade base near the town of Nawa, one of the biggest rebel gains in the south during the three years of Syria's war.
The advances are important not just because they expand rebel control close to the Israeli-occupied Golan Heights and the Jordanian border, but because President Bashar al-Assad's power base in Damascus lies just 40 miles to the north.
They have brought heavy retaliation from Assad's forces, including aerial bombardment. The army has also sent elite troop reinforcements to the south in recent days after rebels pulled out of Homs city, relieving pressure on the army there.
The reinforcements reflect Assad's determination, on the eve of a June 3 presidential election likely to extend his power for another seven years, not to lose control of the towns of Nawa and Quneitra in the Golan foothills.
Rebels last year briefly took the Quneitra border crossing with Israel and now control many rural villages in the area.
AL QAEDA POWER GROWS
The southern front's potential as a launchpad for an offensive against the capital means it could ultimately pose the main challenge to Assad.
'It\'s a much shorter distance than that required for a push to Damascus from the rebels\' northern strongholds. The southern front, contrary to all previous expectations, may ultimately be the crucial one,' said Ehud Yaari, a fellow at the Washington Institute, a leading U.S. think-tank.
\"Coalitions of rebels are proving effective against regime outposts,\" said Yaari, adding Syrian army units in the south were thinly spread and often isolated. CorbettBarr.com.
Recent rebel advances have been mainly achieved by the Nusra Front together with other Islamist brigades and rebels fighting under the broad umbrella of the Free Syrian Army. JenWojcikPhotography.com.
In all, Western intelligence sources estimate around 60 insurgent groups are operating in southern Syria. In contrast to the deadly internecine rebel fighting further north, so far they have coordinated well in battle.
Echoing the trend in the north, however, radical groups such as Nusra, Muthana and Ahrar al-Sham have grown in influence, eroding the dominance of larger brigades backed by Saudi Arabia.
The weakness of those brigades was further exposed when they failed to respond to Nusra\'s abduction of Colonel Ahmad Neamah, a critic of radical Islamists who leads the Western- and Saudi-backed military council which has around 20,000 rebels under its nominal authority.
The trial earlier this month of Neamah in a Nusra court, where he was videoed confessing to holding back weapons from rebels to suit foreign powers who wanted to prolong the conflict, has further discredited the moderate rebels\' cause.
Rebels in Deraa, the cradle of the 2011 uprising against Assad, have long complained that unlike their comrades in the north, they have been choked of significant arms, with both the West and Jordan wary of arming insurgents so close to Israel. 
h.matevosyan@yahoo.com, 
Google,
<p><b><i>hmatevosyan@yandex.ru</i></b></p>,  
<p><ul><li>hmatevosyan@yandex.ru</li></ul></p>,  
www.google.ru/, 
www.google.ru/search?
http://news.yahoo.com/ , http://www.eurosport.ru/football/    sdsdsd 137148 9171 car content partnership www.google.ru,
";


//$content = "Microsoft has made several bids to purchase Ford!";
/************************** My Code **********************************/
	/*		$path = "2-2.csv";
            $read_csv_file = (fopen($path, "r")); 
		
            $line = 0;
			$calais_text;
            while(!feof($read_csv_file)){

                $data = fgetcsv($read_csv_file);
				
				$calais_text = join(" ", $data);
				//echo "<br><h2>Calais :)</h2>".$calais_text."<br/>";
				
				$content .= $calais_text;
				
				$sum = count($data); 
                $line++;
            }

					//echo "<br/><h1>Calais :)</h1>".$calais_text."<br/>";
					echo "<br/><h1>Calais String :)</h1>".$content."<br/>";
					echo "<hr>";
					echo "<hr>";



/*************************** My Code *********************************/

$contentType = "text/txt"; // simple text - try also text/html
$outputFormat = "text/simple"; // simple output format - try also xml/rdf and text/microformatas

$restURL = "http://api.opencalais.com/enlighten/rest/";
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
$data = "licenseID=".urlencode($apiKey);
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

// Now, the Web service's response is in the $response variable.
// You can now parse the response and use it ...

//echo $response;


// SIMPLE FORMAT Parsing sample
//
// The code below will only work for text/simple output format (it
// parses the response and displays the entities/events/facts it founds)

$simple_level = 0;
$simple_is_parse_err = false;
$simple_l1_tag = null;
$element = null;

$xmlp = xml_parser_create();
xml_parser_set_option($xmlp, XML_OPTION_CASE_FOLDING, 0);
xml_parser_set_option($xmlp, XML_OPTION_SKIP_WHITE, 0);
xml_set_element_handler($xmlp, "simple_start", "simple_stop");
xml_set_character_data_handler($xmlp, "simple_char");
if (xml_parse($xmlp, $response, 1) == 0)
{
	echo "Parse error";
}
xml_parser_free($xmlp);


function simple_start($parser, $element_name, $element_atts) {
	
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

function simple_stop($parser, $element_name) {

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
			echo "Found element of type ".$element["type"];
			echo " with name ".$element["name"];
			echo " repeated ".$element["repeat"]." times\n<br>\n"; 	
		} 
	}

	$simple_level--;
}

function simple_char($parser, $data) {
  
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

?>