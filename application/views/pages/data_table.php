<?php


?>
<style>
tr.selected {
            background-color: #3875d7;
            color: #FFF;
}
</style>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css">
<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js" type="text/javascript" ></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.finderselect/0.6.0/jquery.finderselect.min.js"></script>
<table class="table" id="demo3">
            <thead>
            <tr>
                <th></th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Test</td>
                <td>Data</td>
                <td>Set</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Test</td>
                <td>Data</td>
                <td>Set</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Test</td>
                <td>Data</td>
                <td>Set</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Test</td>
                <td>Data</td>
                <td>Set</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Test</td>
                <td>Data</td>
                <td>Set</td>
            </tr>
            </tbody>
</table>
<button>gdfh</button>
<script>
$('button').click(function() {
    alert($('tr.selected').text());
 });       
$('#demo3').find('tbody').finderSelect();
$('#demo3 td').click(function() {
        alert($(this).text());
 $(this).prop('contesnteditable',true);
});
</script>