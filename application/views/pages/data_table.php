<table class="table tablesorter" id="url_preview_table">
            <tr>
    <?php foreach ($records[1] as $k=>$v ){
        echo "<th>".$k."</th>";
    } ?>
            </tr>           
    <?php 
    foreach ($records as $value) {
        echo'<tr>';
        foreach ($value as $v){
        echo "<td>$v</td>";
        }
        echo'</tr>';
    }?>
            
</table>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css">
<style>
tr.selected {
            background-color: #3875d7;
            color: #FFF;
}
.table th {
           background-image:url('http://cdn.jsdelivr.net/tablesorter/2.17.0/css/images/black-unsorted.gif');
           background-repeat: no-repeat;
           background-position:70% 50%;
           padding-right: 10px;
           cursor: pointer;
}
</style>
<script>      
$('#url_preview_table').find('tbody').finderSelect();
</script>