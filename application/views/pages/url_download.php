<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/7/14
 * Time: 10:31 AM
 * To change this template use File | Settings | File Templates.
 */
?>

<h2>URL Download</h2>
<div id="table-wrapper-download">
    <div id="table-scroll-download">

        <table id="url_download_table"  border="0">
            <thead>
            <tr>
                <th class="url_download_table_first"><span class="text">ID</span></th>
                <th class="url_download_table_first"><span class="text">Date</span></th>
                <th class="url_download_table_second"><span class="text">Name</span></th>
                <th class="url_download_table_third"><span class="text">Download</span></th>
<!--            <th class="url_download_table_fourth"><span class="text">Description(last id)</span></th>-->
            </tr>
            </thead>
            <tbody class="show_file_data">

            </tbody>
        </table>

    </div>
</div><!--#table-wrapper-download-->
<script language="javascript" type="text/javascript">

    var base_url = "<?php echo base_url(); ?>";

    /**
     *  File: column_selector.php
     *  Description: Add new headers into database (data table)
     */
    $('.url_download').click( function() {
            $.ajax({
                type: 'POST',
                url: base_url + 'download/get_files',
                success: function(data){
                    $('.show_file_data').html(data);
                }
            });
    });

</script>
