<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/7/14
 * Time: 2:18 PM
 * To change this template use File | Settings | File Templates.
 */

?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <style type="text/css">
            label{display: block;}
        </style>
    </head>
<body>
<h2>Edit Pages</h2>

<?php if(isset($records)) : foreach($records as $row): ?>

<?php echo form_open('crud/update/'.$row->id); ?>
<p>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="<?php echo $row->title; ?>">
</p>
<p>
    <label for="content">Content</label>
    <input type="text" name="content" id="title" value="<?php echo $row->content; ?>">
</p>
<p>
    <input type="submit" value="Submit">
</p>
<?php echo form_close(); ?>

<?php endforeach; ?>
<?php else : ?>
    <h2>No records were returned</h2>
<?php endif; ?>
<p>
<?php echo anchor("crud/index/", "Back"); ?>
</p>
</body>
</html>