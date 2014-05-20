<footer>
    <br><hr>
    <div class="copy_right">
        Copyright (C) Website.com<br/>
        All Rights Reserved kjkj
    </div>
</footer>
<script language="javascript" type="text/javascript">

    /**
     *  File: user_management.php
     * */
    $('#tree1').checkboxTree();


    /**
     *  File: url_upload
     * */
    $(document).ready(function() {
        $('#submitbtn').click(function() {

            var options = {
                target:        '#viewfile',   // target element(s) to be updated with server response
                success:       call_defaults  // post-submit callback
            };
            $(".uploadform").ajaxForm(options).submit();
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

    function call_defaults(){

        default_header();

        /**
         *  File: column_selector.php
         *  Description: Manually add new headers from URL Upload page to database
         */
        $('#add_url_upload').click( function() {

            var header_title = $('#header_url_upload').val();
            var alpha_num = $('input[name=alpha_num]:checked').val();
            var editable = $('#checkbox_url_upload').is(':checked') ? 1 : 0;

            //alert(header_title + ' + ' + alpha_num + ' + ' + editable);

            $.ajax({
                type: 'POST',
                url: base_url + 'crud/response',
                data:  'alpha_num=' + alpha_num + '&header_title=' + header_title + '&editable_cbx=' + editable,
                success: function(data){
                    $('.db_header_results').html(data);
                }
            });
            $('#header_url_upload').val('');
        });

        /**
         *  File: column_selector.php
         *  Description: Manually move items up and down inside select tag u.sing button
         */
        $('#wrap').on('click', '.move_item', function() {

            var $op = $('#wrap').find('#url_db_headers').children('option:selected');

            $this = $(this);

            if($op.length){
                ($this.val() == 'Up') ?
                    $op.first().prev().before($op) :
                    $op.last().next().after($op);
            }
        });

    }//call_defaults

     function default_header(){
     $.ajax({
         async: false,
         type: 'POST',
         url: base_url + 'crud/response',
         success: function(data){
            $('.db_header_results').html(data);
         }
         });
     }
     default_header();


    /**
     *  Supported file: dbmanager.php
     *  Description: Add new headers into database
     */
    $('.addHeader').click( function() {

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
    /*
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
     */

</script>
</body>
</html>
