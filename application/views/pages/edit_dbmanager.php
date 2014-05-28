
<?php if(isset($records)) : foreach($records as $row): ?>

<form id="comment" method="post" class="db_manager">
<table border="1" align="center">
    <tr>
        <th><h3>Edit URL Database Headers</h3></th>
    </tr>
    <tr>
        <td>
			<div id="edit_header_id"><?php echo $row->id; ?></div>
		</td>
    </tr>
    <tr>
        <td>
			<input type="text" size="50" name="header_title" id="edit_header" value="<?php echo $row->header_title; ?>">
		</td>
    </tr>
    <tr>
            <?php if($row->alpha_num == 'Alpha'):?>
                <td>
			        <input type="radio" name="alpha_num" id="edit_alpha" value="alpha" checked>Alpha &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            <?php else : ?>
                <td>
                    <input type="radio" name="alpha_num" id="edit_alpha" value="alpha">Alpha &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            <?php endif; ?>
    </tr>
    <tr>
        <?php if($row->alpha_num == 'Numeric'):?>
            <td>
                <input type="radio" name="alpha_num" id="edit_numeric" value="numeric" checked> Numeric
            </td>
        <?php else : ?>
            <td>
                <input type="radio" name="alpha_num" id="edit_numeric" value="numeric"> Numeric
            </td>
        <?php endif; ?>
    </tr>
    <tr>
        <?php if($row->editable_cbx == 1):?>
        <td>
			<input type="checkbox" name="editable_cbx" id="edit_checkbox" value="1" checked> Editable
		</td>
        <?php else : ?>
            <td>
                <input type="checkbox" name="editable_cbx" id="edit_checkbox" value="0"> Editable
            </td>
        <?php endif; ?>
    </tr>
    <tr>
        <td>
            <input type="button" class="updateHeader" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="backTodbmanager" value="Back">
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
    $('.updateHeader').click( function() {
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