<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/8/14
 * Time: 3:46 PM
 * To change this template use File | Settings | File Templates.
 */

?>
<h2>Statistics</h2>
<br>
<div class="statistics_title">
    <div id="logs">
        <b>Logs</b>
    </div><!--#logs-->
    <div id="unique_domains">
        <button id="domains">Total Unique Domains <span class="total_unique_domains"></span></button>
    </div><!--#unique_domains-->
    <div id="db_stats">
        <b>URL Database Stats</b>
    </div><!--#db_stats-->
</div><!--#statistics_title-->
<br/>
<br/>
    <table align="center" width="98%" border="0" >
        <tr>
            <th align="left">
                <button id="clear_logs" class="logs">Clear Logs</button>
                <button id="copy_logs" class="logs">Copy Logs</button>
                <button id="save_logs" class="logs">Save Logs</button>
            </th>
            <th>
                Select data:
                <select>
                    <option value="volvo">Content Analysis</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                </select>
            </th>
        </tr>
    </table>
<div id="stats_tables">
    <div id="stats_time">
        <table align="left" width="100%" border="0" id="time_indication">

        </table>
    </div><!--#stats_time-->
    <div id="stats_categories">
        <table align="right" width="100%" border="0" id="data_point">
            <tr>
                <th>Data point</th>
                <th>value</th>
                <th></th>
            </tr>
            <tr>
                <td>Cars</td>
                <td>2164</td>
                <td></td>
            </tr>
            <tr>
                <td>Health</td>
                <td>4000</td>
                <td></td>
            </tr>
            <tr>
                <td>Music</td>
                <td>200</td>
                <td></td>
            </tr>
            <tr>
                <td>Science</td>
                <td>33</td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div><!--#stats_categories-->
</div><!--#stats_tables-->

<script language="javascript" type="text/javascript">

    var base_url = "<?php echo base_url(); ?>";

    /**
     *  File: statistics.php
     *  Description: Get the number of rows after reloading.
     */
    function get_unique_domains(){
        $.ajax({
            url: base_url + 'file/domain_sum/',
            success: function(data){
                $('.total_unique_domains').html(data);
            }
        });
    }
    get_unique_domains();

    /**
     *  File: statistics.php
     *  Description: Get the number of rows after clicking 'Total Unique Domains' button
     */
    $('#domains').click( function() {
        $.ajax({
            type: 'POST',
            url: base_url + 'file/domain_sum/',
            success: get_unique_domains
        });
    });


    function get_new_domains(){
        $.ajax({
            url: base_url + 'file/new_domains/',
            success: function(data){
                $('#time_indication').html(data);
            }
        });
    }
    get_new_domains();

</script>
