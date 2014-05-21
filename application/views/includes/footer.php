<footer>
    <br><hr>
    <div class="copy_right">
        Copyright (C) Website.com<br/>
        All Rights Reserved
    </div>
</footer>
<script language="javascript" type="text/javascript">

    <?php
        if(!empty($current)){
            echo 'var current = "'.$current.'";';
        }
    ?>

    /**
     *  File: user_management.php
     * */
    $('#tree1').checkboxTree();

    /**
     *  File: url_upload
     * */
        $('#submitbtn').click(function() {

            var options = {
                target:        '#viewfile',   // target element(s) to be updated with server response
                success:       call_defaults  // post-submit callback
            };
            $(".uploadform").ajaxForm(options).submit();
        });


    /**
     *  File: dbmanager.php
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


        /**
         *  File: column_selector.php
         *  Description: Manually add new headers in Column Selector page from select tag to database.
         *              Values in select tag are collected from .CSV fikle
         */
        $('#add_header_from_url').click( function() {

            var header_title = $('#select_header option:selected').val();

            $.ajax({
                type: 'POST',
                url: base_url + 'crud/response',
                data:  'header_title=' + header_title,
                success: function(data){
                    $('.db_header_results').html(data);
                }
            });
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
     *  File: column_selector.php
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
