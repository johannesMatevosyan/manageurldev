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
    <?php
        echo "<pre>";
           // print_r($_POST);
        echo "</pre>";
    ?>
    <h2>Create</h2>
    <?php echo form_open('crud/create'); ?>
    <?php //echo form_open(''); ?>
        <p>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </p>
        <p>
            <label for="content">Content</label>
            <input type="text" name="content" id="content">
        </p>
        <p>
            <label for="alpha_num">Alpha</label>
            <input type="radio" name="alpha_num" id="alpha" value="alpha" checked>
        </p>
        <p>
            <label for="alpha_num">Numeric</label>
            <input type="radio" name="alpha_num" id="numeric" value="numeric">
        </p>
        <p>
            <label for="editable_cbx">Editable</label>
            <input type="checkbox" name="editable_cbx" id="editable_checkbox" value="1" checked>
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
    <?php echo form_close(); ?>
    <hr/>

    <h2>Read</h2>
    <?php if(isset($records)) : foreach($records as $row): ?>
        <h2><?php echo anchor("crud/delete/".$row->id, $row->header_title); ?></h2>
        <div><?php echo $row->content; ?></div>
        <p>
            To edit this page click here:  <?php echo anchor("crud/edit/".$row->id, "Edit"); ?>
        </p>
    <?php endforeach; ?>
    <?php else : ?>
        <h2>No records were returned</h2>
    <?php endif; ?>

    <hr/>
    <p>
        To sample the delete method, simply click on one of the headings listed above.
        A delete query will automatically run
    </p>
</body>
</html>