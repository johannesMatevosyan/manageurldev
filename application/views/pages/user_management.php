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
            <td style="text-align: right;">Name <input type="text" size="15"></td>
            <td><input type="button" value="Edite User"></td>
            <td rowspan="3">
                <!-- display registered members-->
                <select name="manageUsers" id="manageUsers" multiple >
                    <option value="johan">johan</option>
                    <option value="davehmn">davehmn</option>
                    <option value="davef">davef</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="text-align: right;">Email <input type="text" size="15"></td>
            <td></td>

        </tr>
        <tr>
            <td>Password <input type="text" size="15"></td>
            <td></td>

        </tr>
        <tr>
            <td><br/>
                <b>User Permissions</b><br/><br/>
                <div  class="scrolldiv">
                    <ul id="tree1">
                        <li><input type="checkbox"><label>URL CRM Pages</label></li>
                            <ul>
                                <li>
                                    <input type="checkbox"><label>Statistics</label>
                                </li>
                                    <ul>
                                        <li><input type="checkbox"><label>View</label></li>
                                        <li><input type="checkbox"><label>Edit</label></li>
                                    </ul>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox"><label>Database Manager</label>
                                </li>
                                    <ul>
                                        <li><input type="checkbox"><label>View</label></li>
                                        <li><input type="checkbox"><label>Edit</label></li>
                                    </ul>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox"><label>URL Preview</label>
                                </li>
                                    <ul>
                                        <li><input type="checkbox"><label>View</label></li>
                                        <li><input type="checkbox"><label>Edit</label></li>
                                    </ul>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox"><label>URL Upload</label>
                                </li>
                                    <ul>
                                        <li><input type="checkbox"><label>View</label></li>
                                        <li><input type="checkbox"><label>Edit</label></li>
                                    </ul>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox"><label>URL Download</label>
                                </li>
                                    <ul>
                                        <li><input type="checkbox"><label>View</label></li>
                                        <li><input type="checkbox"><label>Edit</label></li>
                                    </ul>
                            </ul>
                            <ul>
                                <li>
                                    <input type="checkbox"><label>User management</label>
                                </li>
                                    <ul>
                                        <li><input type="checkbox"><label>View</label></li>
                                        <li><input type="checkbox"><label>Edit</label></li>
                                    </ul>
                            </ul>
                </div>
            </td>
            <td></td>
        </tr>
        <tr>
            <td><input type="button" class="editUser" value="Save User"></td>
            <td></td>
        </tr>
    </table>


<script language="javascript" type="text/javascript">

    function show_members(){

        $.ajax({
            type: 'POST',
            url: base_url + 'members/response_members/',
            data: '';
            success: function(data){
                $('.manageUsers').html(data);
            }
        });
    }
    show_members();

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