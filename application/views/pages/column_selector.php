<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/13/14
 * Time: 2:47 PM
 * To change this template use File | Settings | File Templates.
 */

/**
 * Read uploaded .CSV files
 */
$file_formats = array("xlsx", "csv");

$filepath = "assets/upload/";

if (true) {

    $name = $_FILES['imagefile']['name']; // filename to get file's extension
    $size = $_FILES['imagefile']['size'];
    $type = $_FILES["imagefile"]['type'];

    $add_name = strstr($name, '.', true); //to cut off '.csv' part

    if (strlen($name))
    {
        $extension = substr($name, strrpos($name, '.') + 1 );

        if (in_array($extension, $file_formats)) // check it if it's a valid format or not
        {
            if ($size < (2048 * 1024)) // check it if it's bigger than 2 Mb or no
            {
                $imagename = md5(uniqid() . time()) . "---".$name;

                $tmp = $_FILES['imagefile']['tmp_name'];

                $pure_name_plus = strstr($imagename, "---");
                $pure_name = substr($pure_name_plus, 3);

                $path = $filepath.$imagename;

                if (move_uploaded_file($tmp, $filepath.$imagename))  // move to new directory
                {

                    $file = fopen($path,"r");

                    $first_line = (fgets($file)); // to read only first line of a .CSV file

                    $number_of_csv_words = str_word_count($first_line);

                    $first_line_array = explode(",", $first_line);
                    /**
                     *  Fill values from uploaded .CSV file into column selector
                     */

                    echo '
                            <h2> Column Selector </h2>
                            <form id="csv_olumn_headers" action="" method="post">
                                <table  align="center" border="0" cellpadding="0">
                                    <tr>
                                        <th>CSV Column headers</th>
                                        <th>URL Database Headers</th>
                                        <th>Select Header</th>
                                        <th>Add New Header</th>
                                    </tr>
                                    <tr id="wrap">
                                        <!-- CSV Column headers -->
                                        <td>
                                            <select name="url_db_headers1" id="url_db_headers1" multiple >';
                                               for($i = 0; $i < $number_of_csv_words; $i++)
                                               {
                                                   echo '<option value='.$first_line_array[$i].'>'.$first_line_array[$i].'</option>';
                                               }
                                       echo '</select>
                                        </td>
                            </form>

                            <form id="url_upload_db_headers" action="" method="post">
                                        <!-- URL Database Headers -->
                                        <td >
                                        <select name="url_db_headers" id="url_db_headers" class="db_header_results" multiple=""></select>
                                        </td>
                                        <td>
                                            <!-- Select Header -->
                                            <select name="select_header" id="select_header" style="max-width:120px;">';
                                                for($i = 0; $i < $number_of_csv_words; $i++)
                                                {
                                                    echo '<option value="'.$first_line_array[$i].'">'.$first_line_array[$i].'</option>';
                                                }
                                                echo '</select>
                                            <br/><br/>
                                           <input type="button" class="button" style="width:90px;" id="add_header_from_url" value="Add"><br/><br/>
                                           <input type="button" class="button move_item" style="width:90px;" id="move_up" value="Up"><br/><br/>
                                           <input type="button" class="button move_item" style="width:90px;"  id="move_down" value="Down"><br/><br/>
                                        </td>
                                        <td>
                                           <input type="text" size="20" name="header_title" id="header_url_upload" placeholder="Name"><br/>

                                            <input type="radio" name="alpha_num" id="alpha_url_upload" value="alpha" checked>Alpha &nbsp;&nbsp;&nbsp;&nbsp;<br/>
                                            <input type="radio" name="alpha_num" id="numeric_url_upload" value="numeric"> Numeric<br/><br/>
                                            <input type="checkbox" name="editable_cbx" id="checkbox_url_upload" value="1" checked> Editable<br/>

                                           <input type="button" size="20" id="add_url_upload" class="add_url_upload" value="Add New Header">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div class="upload_checkbox">
                                                <input type="checkbox" id="update_urls" name="update" value="1">
                                                <span class="upload_stat">Update Statistics?(update already existing URLs statistics)</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="button" class="yellowButton upload_file button" value="Upload"></td>
                                        <td><input type="button" class="yellowButton cancel-upload button" value="Cancel"></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </form>';

                    fclose($file);

                }
                else
                {
                    echo "<h2><b>Could not move the file.<b></h2>
                         <p style='text-align: center;'><a href='statistics'>Home page</a></p>";
                }
            }
            else
            {
                echo "<h2><b>Your file size is bigger than 2MB.<b></h2>
                     <p style='text-align: center;'><a href='statistics'>Home page</a></p>";
            }
        }
        else
        {
            echo "<h2><b>Invalid file format.<b></h2>
                  <p style='text-align: center;'><a href='statistics'>Home page</a></p>";
        }
    }
    else
    {
        echo "<h2><b>Please select file <b></h2>
               <p style='text-align: center;'><a href='statistics'>Home page</a></p>";
    }

}
?>
<script language="javascript" type="text/javascript">
    var user_type = "<?php echo $this->session->userdata('type'); ?>";
    var page_url_upload = "<?php echo $this->session->userdata('url_upload'); ?>";


    /**
     *  File: column_selector.php
     *  Description: Add new headers into database (data table)
     */
     $(function(){
         $('.upload_file').click( function() { 
            if(page_url_upload == 'viewer')
            {
                document.location.href = base_url + 'block';
            }
            else
            {
                var csf_file_name = "<?php echo $imagename; ?>";
                var update = $("#update_urls").is(":checked");
                $.ajax({ 
                    cache:false,
                    data:{'file':csf_file_name, 'update':update},
                    url: base_url + 'file/send_csv_data'
                });
	window.location.href = base_url;
            /**
             *  To redirect page to the statistics tab after the 'Upload' button was clicked
             */
            }
        });

        $('.cancel-upload').click(function() {
            window.location.href = base_url + '?current=url_upload';
        })


     })
   

    /**
     *  File: column_selector.php
     *  Description: send uploaded file name to controller
     */
    var file_name = "<?php echo $pure_name; ?>";

</script>
