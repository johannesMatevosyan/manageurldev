<footer class="site_footer">
    <hr>
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
   function default_header(){
     $.ajax({
         async: false,
         type: 'POST',
         url: base_url + 'crud/ajax_get_headers',
         success: function(data){
            $('.db_header_results').html(data);
            }
         });
     }
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
                url: base_url + 'crud/ajax_set_headers',
                data:  'alpha_num=' + alpha_num + '&header_title=' + header_title + '&editable_cbx=' + editable,
                success: default_header
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
                url: base_url + 'crud/ajax_set_headers',
                data:  'header_title=' + header_title,
                success: default_header
            });
        });
    }//call_defaults
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
    function get_table_datas(){
     $.ajax({
         type: 'POST',
         url: base_url + 'crud/get_table_datas',
         success: function(data){
            $('#table-scroll').html(data);
         }
         });
     }
     get_table_datas();
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
            url: base_url + 'crud/ajax_set_headers',
            data:  'alpha_num=' + alpha_num + '&header_title=' + header_title + '&editable_cbx=' + editable,
            success: default_header
        });
        $('#header_title').val('');
    });
    /*
     * delete and edite
     *  File: dbmanager.php
     */
    $('.deleteHeader').click( function() {
        var delete_header = $('#url_db_headers').children(":selected").val();
        $.ajax({
            type: 'POST',
            url: base_url + 'crud/delete_header',
            data:  'delete_header=' + delete_header,
            success: default_header
        });
        $('#header_title').val('');
    });


    /**
     *  File: dbmanager.php
     *  Description: Edit selected header by id in database
     */
    $('.editHeader').click( function() {
        var edit_header = $('#url_db_headers').children(":selected").val();
        $.ajax({
            type: 'POST',
            url: base_url + 'crud/ajax_edit_headers/',
            data:  'header_title=' + edit_header,
            success: function(data){
                $('#info .db_manager').html(data);
            }
        });
        $('#header_title').val('');
    });


</script>
</body>
</html>
