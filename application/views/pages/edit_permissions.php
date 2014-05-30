<?php
    //echo $records[0]->username."itititititii<br/>";
?>

    <form id="editUserRoles" method="post" class="editUserRoles">
        <table border="1" align="center">
            <tr>
                <th colspan="5"><h3>Edit User Permissions</h3></th>
            </tr>

            <tr>
                <td>
                    User Id
                </td>
                <td>
                    User name
                </td>
                <td>
                    Page name
                </td>
                <td colspan="2">
                    User's status per page
                </td>
            </tr>
            <tr>
                <td>
                    <div id="edit_user_id"><?php echo $records[0]->id; ?></div>
                </td>

                <td>
                    <input type="text" size="25" name="" id="" value="<?php echo $records[0]->username;?>">
                </td>
                <td>

                </td>
                <td colspan="2">

                </td>
            </tr>
            <?php if(isset($records)) : foreach($records as $row): ?>
            <tr>
                <td>

                </td>
                <td>

                </td>
                <td>
                    <input type="text" size="30" name="header_title" id="edit_header" value="<?php echo $row->pagename; ?>">
                </td>
                <td>
                    <?php if($row->type == 'editor'){ ?>
                        <label class="user_perm"> editor</label>
                        <input type="radio" size="30" name="" id="" value="" checked>
                    <?php } else { ?>
                        <label class="user_perm"> editor</label>
                        <input type="radio" size="30" name="" id="" value="">
                    <?php } ?>
                </td>
                <td>
                    <?php if($row->type == 'viewer'){ ?>
                        <label class="user_perm"> viewer</label>
                        <input type="radio" size="30" name="" id="" value="" checked>
                    <?php } else { ?>
                        <label class="user_perm">viewer</label>
                        <input type="radio" size="30" name="" id="" value="">
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="5">
                    <input type="button" class="updateUser button" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;
                    <!--<input type="button" class="backTodbmanager button" value="Back">-->
                </td>
            </tr>
        </table>
    </form>



<?php else : ?>
    <h2>No records were returned</h2>
<?php endif; ?>


<script language="javascript" type="text/javascript">

    /**
     *  File: edit_permissions.php
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