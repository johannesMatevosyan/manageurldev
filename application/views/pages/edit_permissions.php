   <form id="editUserRoles" method="post" class="editUserRoles" action="<?php echo base_url(); ?>members/set_edit_permission">

        <table align="center">
            <tr>
                <td colspan="3">
            <h3>Edit User Permissions</h3>
                </td>
            </tr>
            <tr>
                <td class="editPermTd">
                    User name
               </td>
            <td colspan="2">
          <input type="text"  name="username" id="username" value="<?php  echo $records[0]->username;?>">
               </td>
            </tr>
             <tr>
                  <td class="editPermTd">
                    Email
                  </td>
                <td colspan="2">
                <input type="email" name="email_address"  value="<?php echo $user[0]->email_address;?>">
                 </td>
            </tr>
             <tr>
                <td class="editPermTd">
                    Password
                </td>
                <td colspan="2">
                    <input type="password" name="password" value="">
                </td>
           <tr>
                <td colspan="3">
                    &nbsp;<br>
                </td>
            </tr>
                <td>
                    <h4>Page name</h4>
                </td>
                <td colspan="2">
                    <h4>User's status per page</h4>
                </td>
            </tr>

            <?php if(isset($records)) : foreach($records as $row): ?>
            <tr>
                <td>
                    <?php echo $row->pagename; ?>
                        <input type="hidden" size="30" name="<?php echo $row->id ?>[pagename]" id="edit_header" value="<?php echo $row->pagename; ?>">
                </td>
                <td>
                    <?php if($row->type == 'editor'){ ?>
                        <label class="user_perm"> editor</label>
                        <input type="radio" size="30" name="<?php echo $row->id ?>[type]" id="" value="editor" checked>
                    <?php } else { ?>
                        <label class="user_perm"> editor</label>
                        <input type="radio" size="30" name="<?php echo $row->id ?>[type]" id="" value="editor">
                    <?php } ?>
                </td>
                <td>
                    <?php if($row->type == 'viewer'){ ?>
                        <label class="user_perm"> viewer</label>
                        <input type="radio" size="30" name="<?php echo $row->id ?>[type]" id="" value="viewer" checked>
                    <?php } else { ?>
                        <label class="user_perm">viewer</label>
                        <input type="radio" size="30" name="<?php echo $row->id ?>[type]" id="" value="viewer">
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3">
                    <input type="submit" class="updateUser button" value="Update">
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