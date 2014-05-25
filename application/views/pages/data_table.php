<?php


?>
<table class="table tablesorter" id="demo3">
            <thead>
            <tr>
    <?php foreach ($words as $value) {
        echo "<th>$value</th>";
    } ?>
            </tr>
            </thead>
            <tbody>
            <tr>
    <?php foreach ($words as $value) {
        echo "<td>111</td>";
    } ?>
            </tr>
            <tr>
    <?php foreach ($words as $value) {
        echo "<td>222</td>";
    } ?>
            </tr>
            </tbody>
</table>
<button>gdfh</button>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css">
<link rel="stylesheet" href="http://cdn.jsdelivr.net/tablesorter/2.17.0/css/theme.default.css">
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
<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js" type="text/javascript" ></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.finderselect/0.6.0/jquery.finderselect.min.js"></script>
<script src="http://cdn.jsdelivr.net/tablesorter/2.17.0/js/jquery.tablesorter.min.js"></script>
<script>
$('button').click(function() {
    alert($('tr.selected').text());
 });       
//$('#demo3').find('tbody').finderSelect();
$('#demo3 td').click(function() {
        alert($(this).text());
 $(this).prop('contesnteditable',true);
});
$(".tablesorter").tablesorter(); 
</script>