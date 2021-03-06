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
<form id="editUserRoles" method="post" class="editUserRoles">
<table  align="center">
    <tr>
        <th id="userRolesTh1">Add New User</th>
        <th id="userRolesTh2"></th>
        <th id="userRolesTh3">Active Users</th>
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
            <li><label>URL CRM Pages</label>
                <ul>
                    <li>
                        <label>Statistics</label>

                    <ul>
                        <li><input name="statistics_perm" id="statistics_view" type="radio"  value="viewer" checked><label>View</label>
                        <li><input name="statistics_perm" id="statistics_edit" type="radio"  value="editor"><label>Edit</label>
                    </ul>
                </ul>
                <ul>
                    <li>
                        <label>Database Manager</label>

                    <ul>
                        <li><input name="dbmanager_perm" id="dbanager_view" type="radio"  value="viewer" checked><label>View</label>
                        <li><input name="dbmanager_perm" id="dbanager_edit" type="radio"  value="editor"><label>Edit</label>
                    </ul>
                </ul>
                <ul>
                    <li>
                        <label>URL Preview</label>

                    <ul>
                        <li><input name="url_preview_perm" id="url_preview_view" type="radio"  value="viewer" checked><label>View</label>
                        <li><input name="url_preview_perm" id="url_preview_edit" type="radio"  value="editor"><label>Edit</label>
                    </ul>
                </ul>
                <ul>
                    <li>
                        <label>URL Upload</label>

                    <ul>
                        <li><input name="url_upload_perm" id="url_upload_view" type="radio" value="viewer" checked><label>View</label>
                        <li><input name="url_upload_perm" id="url_upload_edit" type="radio"  value="editor"><label>Edit</label>
                    </ul>
                </ul>
                <ul>
                    <li>
                        <label>URL Download</label>

                    <ul>
                        <li><input name="url_download_perm" id="url_download_view" type="radio"  value="viewer" checked><label>View</label>
                        <li><input name="url_download_perm" id="url_download_edit" type="radio" value="editor"><label>Edit</label>
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
</form>

<script language="javascript" type="text/javascript">

    var base_url = "<?php echo base_url(); ?>";

    function get_users(){
        $.ajax({
            url: base_url + 'members/index/',
            success: function(data){
                $('.manageUsers').html(data);
            }
        });
    }
    get_users();

    /**
     *  File: user_management.php
     *  Description: Add new user into database
     *  var @statistics_perm: get value 'statistics_perm' input field and assign role to the user;
     *  var @dbmanager_perm: get value 'dbmanager_perm' input field and assign role to the user ;
     *  var @url_preview_perm: get value 'url_preview_perm' input field and assign role to the user ;
     *  var @url_upload_perm: get value 'url_upload_perm' input field and assign role to the user;
     *  var @url_download_perm: get value 'url_download_perm' input field and assign role to the user;
     */

    $('#saveUser').click( function() {

        var new_user_name = $('#addUserName').val();
        var new_user_email = $('#addUserEmail').val();
        var new_user_pass = $('#addUserPass').val();
        var statistics_perm = $('input[name=statistics_perm]:checked').val();
        var dbmanager_perm = $('input[name=dbmanager_perm]:checked').val();
        var url_preview_perm = $('input[name=url_preview_perm]:checked').val();
        var url_upload_perm = $('input[name=url_upload_perm]:checked').val();
        var url_download_perm = $('input[name=url_download_perm]:checked').val();

        $.ajax({
            type: 'POST',
            url: base_url + 'members/set_permission/',
            data: 'username=' + new_user_name + '&email_address=' + new_user_email + '&password=' + new_user_pass + '&statistics=' + statistics_perm + '&dbmanager=' + dbmanager_perm + '&url_preview=' + url_preview_perm + '&url_upload=' + url_upload_perm + '&url_download=' + url_download_perm,
            success: get_users
        });
    });


     /**
     *  File: user_management.php
     *  Description: Edit selected user by id in database
     */
    $('.editNewUser').click( function() {

        var id = $('#manageUsers').children(":selected").attr('id');
        var user_name = $('#manageUsers').val();
        $.ajax({
            type: 'POST',
            url: base_url + 'members/ajax_edit_permissions/',
            data: 'username=' + user_name + '&id=' + id,
            success: function(data){
                //alert(data);
                $('#info .editUserRoles').html(data);
            }
        });
       // $('#header_title').val('');
    });

</script>