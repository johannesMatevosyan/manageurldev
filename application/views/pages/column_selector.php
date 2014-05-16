<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/13/14
 * Time: 2:47 PM
 * To change this template use File | Settings | File Templates.
 */
echo '<h2> Column Selector </h2>';

/**
 * Read uploaded .CSV files
 */
$file_formats = array("jpg", "png", "gif", "bmp", "csv");

$filepath = "assets/upload_images/";

if (true) {

    $name = $_FILES['imagefile']['name']; // filename to get file's extension
    $size = $_FILES['imagefile']['size'];
    $type = $_FILES["imagefile"]['type'];

    if (strlen($name))
    {
        $extension = substr($name, strrpos($name, '.')+1);

        if (in_array($extension, $file_formats)) // check it if it's a valid format or not
        {
            if ($size < (2048 * 1024)) // check it if it's bigger than 2 Mb or no
            {
                $imagename = md5(uniqid() . time()) . "." . $extension;

                $tmp = $_FILES['imagefile']['tmp_name'];

                if (move_uploaded_file($tmp, $filepath.$imagename))  // move to new directory
                {
                    $path = $filepath."/". $imagename;

                    $file = fopen($path,"r");
                    $first_line = (fgets($file)); // to read only first line of a .CSV file

                    $number_of_csv_words = str_word_count($first_line);

                    $first_line_array = explode(",", $first_line);

                    /**
                     *  Fill values from uploaded .CSV file into column selector
                     */

                    echo '   <form id="csv_olumn_headers" action="" method="post">
                                <table  align="center" border="1" cellpadding="0">
                                    <tr>
                                        <th>CSV Column headers</th>
                                        <th>URL Database Headers</th>
                                        <th>Select Header</th>
                                        <th>Add New Header</th>
                                    </tr>
                                    <tr>
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

                            <form id="url_db_headers" action="" method="post">
                                        <!-- URL Database Headers -->
                                        <td class="compare_headers">
                                            <!-- Display headers from database -->
                                        </td>
                                        <td>
                                            <select name="url_db_headers3" id="url_db_headers3">
                                                <option value="PR">PR</option>
                                                <option value="saab">Saab</option>
                                                <option value="opel">Opel</option>
                                                <option value="audi">Audi</option>
                                            </select>
                                           <input type="button" size="20" value="Add"><br/><br/>
                                           <input type="button" size="60" value="Move Up"><br/><br/>
                                           <input type="button" size="60" value="Move Down"><br/><br/>
                                        </td>
                                        <td>
                                           <input type="text" size="20" name="header_title" id="header_title" placeholder="Name"><br/>

                                            <input type="radio" name="alpha_num" id="alpha" value="alpha" checked>Alpha &nbsp;&nbsp;&nbsp;&nbsp;<br/>
                                            <input type="radio" name="alpha_num" id="numeric" value="numeric"> Numeric<br/><br/>
                                            <input type="checkbox" name="editable_cbx" id="editable_checkbox" value="1" checked> Editable<br/>

                                           <input type="button" size="20" name="header_title2" id="header_title2" value="Add New Header">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="text-align: center;"><input type="checkbox" class="">Update Statisstics?(update already existing URLs statistics)</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2"><input type="submit" class="sample1 yellowButton" value="Upload"></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </form>';

                    fclose($file);

                }
                else
                {
                    echo "Could not move the file.";
                }
            }
            else
            {
                echo "Your image size is bigger than 2MB.";
            }
        }
        else
        {
            echo "Invalid file format.";
        }
    }
    else
    {
        echo "Please select image..!";
    }
    //exit();
}