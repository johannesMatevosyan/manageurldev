    <div id='viewfile'>
        <h2>URL Upload!</h2>
        <p>Tips and Notes</p>
        <form class="uploadform" method="post" enctype="multipart/form-data" action='<?php echo base_url().'crud/upload'; ?>'>
            <label for="file">Filename:</label>
            <input type="file" name="imagefile" id="file" /><br>
            <input type="submit" class="yellowButton" name="submitbtn" id="submitbtn" value="Upload">
         </form>
    </div>