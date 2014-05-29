<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/7/14
 * Time: 10:33 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<h2>User Management</h2>
<table  align="center">
    <tr>
        <th style="max-width:100px;">Add New User</th>
        <th style="width: 30%;"></th>
        <th style="width:40%;">Active Users</th>
    </tr>
    <tr>
        <th>&nbsp;</th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td class="addNewUser">Name <input type="text" name="newUserName" id="addUserName" size="15"></td>
        <td><input type="button" class="editNewUser button" value="Edite User"></td>
        <td rowspan="3" class="manageUsers">

            <select name="manageUsers" id="manageUsers" multiple>
                <!-- display registered members-->
            </select>

        </td>
    </tr>
    <tr>
        <td class="addNewUser">Email <input type="email" name="newUserEmail" id="addUserEmail" size="15"></td>
        <td></td>

    </tr>
    <tr>
        <td class="addNewUser">Password <input type="password" name="newUserPass" id="addUserPass" size="15"></td>
        <td></td>

    </tr>
    <tr>
        <td><br/>
            <b>User Permissions</b><br/><br/>
            <div class="scrolldiv">
            <ul id="tree1">
            <li><input type="checkbox"><label>URL CRM Pages</label>
                <ul>
                    <li>
                        <input type="checkbox"><label>Statistics</label>

                    <ul>
                        <li><input name="statistics_perm" id="statistics_view" type="checkbox" onclick="if(this.checked) {$('#statistics_edit').prop('checked', false)}"><label>View</label>
                        <li><input name="statistics_perm" id="statistics_edit" type="checkbox" onclick="if(this.checked) {$('#statistics_view').prop('checked', false)}"><label>Edit</label>
                    </ul>
                </ul>
                <ul>
                    <li>
                        <input type="checkbox"><label>Database Manager</label>

                    <ul>
                        <li><input name="dbmanager_perm" id="dbanager_view" type="checkbox" onclick="if(this.checked) {$('#dbanager_edit').prop('checked', false)}"><label>View</label>
                        <li><input name="dbmanager_perm" id="dbanager_edit" type="checkbox" onclick="if(this.checked) {$('#dbanager_view').prop('checked', false)}"><label>Edit</label>
                    </ul>
                </ul>
                <ul>
                    <li>
                        <input type="checkbox"><label>URL Preview</label>

                    <ul>
                        <li><input name="url_preview_perm" id="url_preview_view" type="checkbox" onclick="if(this.checked) {$('#url_preview_edit').prop('checked', false)}"><label>View</label>
                        <li><input name="url_preview_perm" id="url_preview_edit" type="checkbox" onclick="if(this.checked) {$('#url_preview_view').prop('checked', false)}"><label>Edit</label>
                    </ul>
                </ul>
                <ul>
                    <li>
                        <input type="checkbox"><label>URL Upload</label>

                    <ul>
                        <li><input name="url_upload_perm" id="url_upload_view" type="checkbox" onclick="if(this.checked) {$('#url_upload_edit').prop('checked', false)}"><label>View</label>
                        <li><input name="url_upload_perm" id="url_upload_edit" type="checkbox" onclick="if(this.checked) {$('#url_upload_view').prop('checked', false)}"><label>Edit</label>
                    </ul>
                </ul>
                <ul>
                    <li>
                        <input type="checkbox"><label>URL Download</label>

                    <ul>
                        <li><input name="url_download_perm" id="url_download_view" type="checkbox" onclick="if(this.checked) {$('#url_download_edit').prop('checked', false)}"><label>View</label>
                        <li><input name="url_download_perm" id="url_download_edit" type="checkbox" onclick="if(this.checked) {$('#url_download_view').prop('checked', false)}"><label>Edit</label>
                    </ul>
                </ul>
            </div><!--.scrolldiv-->
        </td>
        <td></td>
    </tr>
    <tr>
        <td><input type="button" class="saveUser button" id="saveUser" value="Save User"></td>
        <td></td>
    </tr>
</table>

<script language="javascript" type="text/javascript">

    var base_url = "<?php echo base_url(); ?>";

    $.ajax({
        url: base_url + 'members/index/',
        success: function(data){
            $('.manageUsers').html(data);
        }
    });


    /**
     *  File: user_management.php
     *  Description: Add new user into database
     */
    $('#saveUser').click( function() {

        var new_user_name = $('#addUserName').val();
        var new_user_email = $('#addUserEmail').val();
        var new_user_pass = $('#addUserPass').val();
        var statistics_perm = $('input[name=statistics_perm]').is(':checked') ? 1 : 0;
        var dbmanager_perm = $('input[name=dbmanager_perm]').is(':checked') ? 1 : 0;
        var url_preview_perm = $('input[name=url_preview_perm]').is(':checked') ? 1 : 0;
        var url_upload_perm = $('input[name=url_upload_perm]').is(':checked') ? 1 : 0;
        var url_download_perm = $('input[name=url_download_perm]').is(':checked') ? 1 : 0;


        //alert(new_user_name + ' - ' + new_user_email + ' - ' + new_user_pass + ' - ' + statistics_perm + ' - ' + dbanager_perm + ' - ' + url_preview_perm + ' - ' + url_upload_perm + ' - ' + url_download_perm);

        $.ajax({
            type: 'POST',
            url: base_url + 'members/set_permission/',
            data:  'username=' + new_user_name + '&email_address=' + new_user_email + '&password=' + new_user_pass + '&statistics=' + statistics_perm + '&dbmanager=' + dbmanager_perm + '&url_preview=' + url_preview_perm + '&url_upload=' + url_upload_perm + '&url_download=' + url_download_perm,
            success: function(data){
                alert(data);
            }
        });
    });


     /**
     *  File: user_management.php
     *  Description: Edit selected user by id in database
     */
    $('.editUser').click( function() {

        var id = $('#manageUsers').children(":selected").attr("id");
        var edit_header = $('#manageUsers').children(":selected").val();

        $.ajax({
            type: 'POST',
            url: base_url + 'crud/edit_headers/',
            data:  'edit_header=' + edit_header + '&id=' + id,
            success: function(data){
                $('#info .db_manager').html(data);
            }
        });
        $('#header_title').val('');
    });


</script>