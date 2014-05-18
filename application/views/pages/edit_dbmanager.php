
<?php if(isset($records)) : foreach($records as $row): ?>

<?php
    echo  $row->alpha_num.'<br/>';
    echo  $row->editable_cbx.'<br/>';
?>

<form id="comment" method="post" class="db_manager">
<table border="1" align="center">
    <tr>
        <th><h3>Edit URL Database Headers</h3></th>
    </tr>
    <tr>
        <td>
			<input type="text" size="50" name="header_title" id="header_title" value="<?php echo $row->header_title; ?>">
		</td>
    </tr>
    <tr>
            <?php if($row->alpha_num == 'Alpha'):?>
                <td>
			        <input type="radio" name="alpha_num" id="alpha" value="alpha" checked>Alpha &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            <?php else : ?>
                <td>
                    <input type="radio" name="alpha_num" id="alpha" value="alpha">Alpha &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            <?php endif; ?>
    </tr>
    <tr>
        <?php if($row->alpha_num == 'Numeric'):?>
            <td>
                <input type="radio" name="alpha_num" id="numeric" value="numeric" checked> Numeric
            </td>
        <?php else : ?>
            <td>
                <input type="radio" name="alpha_num" id="numeric" value="numeric"> Numeric
            </td>
        <?php endif; ?>
    </tr>
    <tr>
        <td>
			<input type="checkbox" name="editable_cbx" id="editable_checkbox" value="1" checked> Editable
		</td>
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

    $('.updateHeader').click( function() {

        var id = $('#url_db_headers').children(":selected").attr("id");
        var delete_header = $('#url_db_headers').children(":selected").val();

        $.ajax({
            type: 'POST',
            url: base_url + 'crud/delete_header/' + id,
            data:  'delete_header=' + delete_header + '&id=' + id,
            success: function(data){
                $('.db_header_results').html(data);
            }
        });
        $('#header_title').val('');
    });

</script>