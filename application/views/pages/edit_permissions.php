<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/29/14
 * Time: 4:37 PM
 * To change this template use File | Settings | File Templates.
 */

if(isset($records)) : foreach($records as $row): ?>

    <form id="editUserRoles" method="post" class="editUserRoles">
        <table border="0" align="center">
            <tr>
                <th><h3>Edit User Permissions</h3></th>
            </tr>
            <tr>
                <td>
                    <div id="edit_header_id"><?php echo $row->id; ?></div>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" size="40" name="header_title" id="edit_header" value="<?php echo $row->username; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" size="40" name="header_title" id="edit_header" value="<?php echo $row->pagename; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" size="40" name="header_title" id="edit_header" value="<?php echo $row->type; ?>">
                </td>
            </tr>

            <tr>
                <?php echo "1"; //if($row->editable_cbx == 1):?>
                    <td>
                        <!--<input type="checkbox" name="editable_cbx" id="edit_checkbox" value="1" checked> Editable-->
                    </td>
                <?php echo "2";  //else : ?>
                    <td>
                    <!--    <input type="checkbox" name="editable_cbx" id="edit_checkbox" value="0"> Editable-->
                    </td>
                <?php echo "3";  //endif; ?>
            </tr>
            <tr>
                <td>
                    <input type="button" class="updateUser button" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" class="backTodbmanager button" value="Back">
                </td>
            </tr>
        </table>
    </form>

<?php endforeach; ?>

<?php else : ?>
    <h2>No records were returned</h2>
<?php endif; ?>


<script language="javascript" type="text/javascript">

    /**
     *  File: dbmanager.php
     *  Description: Update selected header by id in database
     */
    $('.updateUser').click( function() {
        var id = $('#edit_header_id').html();
        var update_header = $('#edit_header').val();
        var alpha_num = $('input[name=alpha_num]:checked').val();
        var editable = $('input[name=editable_cbx]').is(':checked') ? 1 : 0;
        $.ajax({
            type: 'POST',
            url: base_url + 'crud/update_header',
            data:  'header_title=' + update_header + '&alpha_num=' + alpha_num + '&editable_cbx=' + editable  + '&id=' + id + '&old_header=<?php echo $row->header_title; ?>',
            success: function(){
                window.location.href = "<?php echo base_url(); ?>site/statistics?current=db_manager";
            }
        });
        $('#header_title').val('');
    });
</script>