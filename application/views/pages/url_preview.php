<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/7/14
 * Time: 10:27 AM
 * To change this template use File | Settings | File Templates.
 */

?>

<div class="url_preview_heading">
    <div class="search_filter_button">
        <button class="url_preview_buttons" id="search_filter_btn"> Search + Filter</button>
    </div>
    <div class="url_preview_button">
        <button class="url_preview_buttons" id="download_csv_btn"> Download CSV</button>
    </div>
    <h2>URL Preview</h2>
    <button class="url_preview_edit button" id="edit_cell"> Edit Cell</button>
    <!--<p>URL's Per Page</p>
    <select name="urls_per_page" id="urls_per_page" class="url_preview_edit">
        <option value="">250</option>
        <option value="">150</option>
        <option value="">50</option>
    </select>-->
</div><!--url_preview_heading-->
<div id="table-wrapper">
    <div id="table-scroll">
        <table id="url_preview_table" border="0">
            <thead>
            <tr>
                <th><span class="text">Domain</span></th>
                <th><span class="text">URL</span></th>
                <th><span class="text">PR</span></th>
                <th><span class="text">DA</span></th>
                <th><span class="text">PA</span></th>
                <th><span class="text">Likes</span></th>
                <th><span class="text">Shares</span></th>
                <th><span class="text">Email</span></th>
                <th><span class="text">Contact</span></th>
                <th><span class="text">About Us</span></th>
                <th><span class="text">Twitter</span></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>www.google.com</td> <td>http://www.yahoo.com</td> <td>7</td><td>89</td><td>95</td><td>156324</td><td>564255</td><td>contact</td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>2</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>
            <tr>
                <td>3</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>
            <tr>
                <td>4</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>
            <tr>
                <td>5</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>6</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>7</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>8</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>9</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>10</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>11</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>12</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>13</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>14</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>15</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>16</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>17</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>18</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>

            </tbody>
        </table>
    </div><!--#table-scroll-->
</div><!--#table-wrapper-->

<!--Dialog Windows-->
<!-- Search + Filter Dialog Window-->
<div class="dialog" id="search_filter">
    <div class="body">
        <span class="close">x</span>
        <h6>dialog</h6>
        <div class="content">
            <br>
            <h2>Search and Filter</h2>
            <!--first table-->
            <table border="0" cellspacing="0" cellpading="0" style="float:left; margin-left: 20px;">
                <tr>
                    <td rowspan="2"><button class="big_button">PR</button></td>
                    <td>&nbsp;>&nbsp;<input class="smol_input" value="0"/></td>
                </tr>
                <tr>
                    <td>&nbsp;<&nbsp;<input class="smol_input" value="0"/></td>
                </tr>
                <tr>
                    <td rowspan="2"><button class="big_button">DA</button></td>
                    <td>&nbsp;>&nbsp;<input class="smol_input" value="0"/></td>
                </tr>
                <tr>
                    <td>&nbsp;<&nbsp;<input class="smol_input" value="0"/></td>
                </tr>
                <tr>
                    <td><button class="big_button">Content Analysis</button></td>
                    <td>
                        <select name="">
                            <option value="">Animals</option>
                            <option value="">150</option>
                            <option value="">50</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button class="big_button">Country</button></td>
                    <td>
                        <select name="">
                            <option value="">Australia</option>
                            <option value="">150</option>
                            <option value="">50</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button class="big_button">Email</button></td>
                    <td>
                        <select name="">
                            <option value="">Yes</option>
                            <option value="">No</option>
                        </select>
                    </td>
                </tr>
            </table>
            <!-- End first table-->

            <!-- start second table-->
            <table style="float:right; margin-right: 20px;">
                <tr>
                    <th colspan="2" >Include keywords</th>
                </tr>
                <tr>
                    <td width="30%">include</td>
                    <td><input class="" value="Edite Box"/></td>
                </tr>
                <tr>
                    <td><a href="">AND+</a></td>
                    <td><a href="">OR+</a></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <select multiple name="">
                            <option value="">example OR</option>
                            <option value="">keyword</option>
                        </select><br>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">Exclude keywords</th>
                </tr>
                <tr>
                    <td>exclude</td>
                    <td><input class="" value="Edite Box"/></td>
                </tr>
                <tr>
                    <td><a href="">AND+</a></td>
                    <td><a href="">OR+</a></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <select multiple name="">
                            <option value="">bad OR</option>
                            <option value="">wrong</option>
                        </select><br>
                    </td>
                </tr>
            </table>
            <!-- end second table-->
            <div style="clear:both; text-align: center;">
                <button class="yellowButton">Apply</button>
            </div>

        </div><!--.content-->
    </div><!--.body-->
</div><!--.dialog-->

<!-- Download CSV Dialog Window-->
<div class="dialog" id="download_csv_dialog">
    <div class="download_csv_dialog_body">
        <span class="close">x</span>
        <div class="download_csv_content">
            <div style="width: 260px; margin: 10px auto;">
                <h2>Download CSV</h2>
                <input type="checkbox" class="download_csv_cbx" id="download_csv_cbx_1" value="1" checked>Download All URL's<br/><br/>
                <input type="checkbox" class="download_csv_cbx" id="download_csv_cbx_2" value="1" checked>Download Currently Selected<br/><br/>
                <input type="checkbox" class="download_csv_cbx" id="download_csv_cbx_3" value="1" checked>Download All URL's in Filter<br/><br/>

                <label for="download_csv_inp_1">URL list name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" class="" id="download_csv_inp_1" value=""><br/><br/>

                <label for="download_csv_inp_2">URL list description:</label>
                <input type="text" class="" id="download_csv_inp_2" value=""><br/><br/><br/>

                <input type="button" class="yellowButton" id="send_to_download" value="Send to Download">
            </div>
        </div><!--download_csv_content-->
    </div><!--download_csv_dialog_body-->
</div><!--download_csv_dialog_window-->
<!-- Search + Filter Dialog Window-->
<div class="dialog" id="edit_line">
    <div class="body">
        <span class="close">x</span>
        <h6>dialog</h6>
        <div class="content">
            <br>
            <h2>Edit Cell</h2>
            <form method="post" action="<?php echo base_url(); ?>file/edit_cell">
                <div id="for_append"></div>
                <div style="clear:both; text-align: center;">
                    <button class="yellowButton">Apply</button>
                </div>
            </form>
        </div><!--.content-->
    </div><!--.body-->
</div><!--.dialog-->
<script language="javascript" type="text/javascript">
    $( ".close" ).click(function() {
        $(".dialog").hide();
    });
    $( "#search_filter_btn" ).click(function() {
        $("#search_filter").show();
    });
    $( "#download_csv_btn" ).click(function() {
        $("#download_csv_dialog").show();
    });
    $('#edit_cell').click(function() {
        var i=0;

        if($('tr.selected').length>0){
            var valArr = $('tr.selected').html().split('</td>');
            $("#for_append").html('');
            $("#table-scroll th").each( function() {
                $("#for_append").append('<div>'+$(this).text()+': <input name="'+$(this).text()+'" value="'+valArr[i].substr(4)+'"></input></div></br>');
                i++;
            });
            $("#edit_line").show();
        }
        else{
            alert('please choose cell');
        }
    });
</script>