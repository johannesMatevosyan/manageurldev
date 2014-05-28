<!--
/**
*************************************************
** File: navigation.php  **
** Date: 03.05.2014     **
** Time: 15:48 AM    **
** @author Hovhannes Matevosyan **
** Description: This file delivers navigation menu with tabs,
**              the contents of each tab are in content.php file
*************************************************
*/
-->
<div id="info-nav">
    <ul id="navbar-outer">
        <li class="statistics"><a href="#statistics" title="Statistics">Statistics</a></li>
        <li class="db_manager"><a href="#db_manager" title="DB Manager">DB Manager</a></li>
        <li class="url_upload"><a href="#url_upload" title="URL Upload">URL Upload</a></li>
        <li class="url_preview"><a href="#url_preview" title="URL Preview">URL Preview</a></li>
        <li class="url_download"><a href="#url_download" title="URL Download">URL Download</a></li>
        <?php if($this->session->userdata('type') == 'admin'): ?>
            <li class="user_management"><a href="#user_management" title="User Management">User Management</a></li>
        <?php endif; ?>
    </ul><br/>
    <div id="blue_line"></div>
</div>
<br/><br/>
</header>