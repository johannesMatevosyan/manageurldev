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
        <td class="addNewUser">Name <input type="text" id="addUserName" size="15"></td>
        <td><input type="button" class="editNewUser" value="Edite User"></td>
        <td rowspan="3" class="manageUsers">

            <select name="manageUsers" id="manageUsers" multiple>
                <!-- display registered members-->
            </select>

        </td>
    </tr>
    <tr>
        <td class="addNewUser">Email <input type="text" id="addUserEmail" size="15"></td>
        <td></td>

    </tr>
    <tr>
        <td class="addNewUser">Password <input type="text" id="addUserPass" size="15"></td>
        <td></td>

    </tr>
    <tr>
        <td><br/>
            <b>User Permissions</b><br/><br/>
            <div  class="scrolldiv">
                <ul id="tree1">
                    <li><input type="checkbox"><label>URL CRM Pages</label>
                    <ul>
                        <li>
                            <input type="checkbox"><label>Statistics</label>

                        <ul>
                            <li><input type="checkbox"><label>View</label>
                            <li><input type="checkbox"><label>Edit</label>
                        </ul>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox"><label>Database Manager</label>

                        <ul>
                            <li><input type="checkbox"><label>View</label>
                            <li><input type="checkbox"><label>Edit</label>
                        </ul>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox"><label>URL Preview</label>

                        <ul>
                            <li><input type="checkbox"><label>View</label>
                            <li><input type="checkbox"><label>Edit</label>
                        </ul>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox"><label>URL Upload</label>

                        <ul>
                            <li><input type="checkbox"><label>View</label>
                            <li><input type="checkbox"><label>Edit</label>
                        </ul>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox"><label>URL Download</label>

                        <ul>
                            <li><input type="checkbox"><label>View</label>
                            <li><input type="checkbox"><label>Edit</label>
                        </ul>
                    </ul>
                    <ul>
                        <li>
                            <input type="checkbox"><label>User management</label>

                        <ul>
                            <li><input type="checkbox"><label>View</label>
                            <li><input type="checkbox"><label>Edit</label>
                        </ul>
                    </ul>
            </div>
        </td>
        <td></td>
    </tr>
    <tr>
        <td><input type="button" class="saveUser" id="saveUser" value="Save User"></td>
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
     *  Description: Edit selected header by id in database
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