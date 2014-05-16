<footer>
    <br><hr>
    <div class="copy_right">
        Copyright (C) Website.com<br/>
        All Rights Reserved
    </div>
</footer>
<script language="javascript" type="text/javascript">

    /**
     *  Supports file: user_management.php
     * */
    $('#tree1').checkboxTree();


    /**
     *  Supports url_upload
     * */
    $(document).ready(function() {
        $('#submitbtn').click(function() {
            $(".uploadform").ajaxForm({
                target: '#viewfile'
            }).submit();
        });

        /*
         $("a[href$='#url_upload']").click(function() {

         var url_upl = "<?php //echo base_url().'crud/upload'; ?>";
         var url_upl_form = "<h2>URL Upload!</h2><p>Tips and Notes</p><form class='uploadform' method='post' enctype='multipart/form-data' action='<?php echo base_url().'crud/upload'; ?>'>
         <label for='file'>Filename:</label>
         <input type='file' name='imagefile' id='file' /><br>
         <input type='submit' value='Submit' name='submitbtn' id='submitbtn'>
         </form>";

         $("#viewfile").html(url_upl_form);
         });*/
    });

    /**
     *  Supported file: dbmanager.php
     *  @var base_url: Returns your site base URL
     *  @var header_title: Returns value from 'header_title' input file
     *  @var alpha_num: Checks which 'alpha_nukm' radio button is checked and returns value from it
     *  @var editable: Checks if 'editable' checkbox is checked and returns value from it
     *
     *  default_header(): prevents form from sending undefined values to the database,
     *                    after the page was re-loaded.
     *  @link URL: refers to 'crud' controller's response method
     */
    var base_url = "<?php echo base_url(); ?>";

    function default_header(){

        $.ajax({
            type: 'POST',
            url: base_url + 'crud/response', // crud/create
            success: function(data){
                $('.db_header_results').html(data);
            }
        });
    }
    default_header();

    $('.sample1').click( function() {

        var header_title = $('#header_title').val();
        var alpha_num = $('input[name=alpha_num]:checked').val();
        var editable = $('#editable_checkbox').is(':checked') ? 1 : 0;

        $.ajax({
            type: 'POST',
            url: base_url + 'crud/response',
            data:  'alpha_num=' + alpha_num + '&header_title=' + header_title + '&editable_cbx=' + editable,
            success: function(data){
                $('.db_header_results').html(data);
            }
        });
        $('#header_title').val('');
    });

    /**
     *  Supported file: column_selector.php
     *  Description: Make comparison between headers imported from CSV file with the headers already stored in database
     */

    $('.sample1').click( function() {

        var header_title = $('#header_title').val();
        var alpha_num = $('input[name=alpha_num]:checked').val();
        var editable = $('#editable_checkbox').is(':checked') ? 1 : 0;

        $.ajax({
            type: 'POST',
            url: base_url + 'crud/response',
            data:  'alpha_num=' + alpha_num + '&header_title=' + header_title + '&editable_cbx=' + editable,
            success: function(data){
                $('.compare_headers').html(data);
            }
        });

    });

</script>
</body>
</html>

