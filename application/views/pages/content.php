<!--
/**
*************************************************
** File: content.php  **
** Date: 03.05.2014     **
** Time: 2:10 PM   **
** @author Hovhannes Matevosyan **
** Description: This file switches selected tabs from navigation menu **
*************************************************
*/
-->
<div class="wrapper">
    <div id="info">
        <div id="statistics" class="pages">
            <?php
                include 'statistics.php';  /** load database management page */
            ?>
        </div>
        <div id="db_manager" class="pages">
            <?php
                include 'dbmanager.php';  /** load database management page */
            ?>
        </div><!--db_manager-->
        <div id="url_upload" class="pages">
            <?php
                include 'url_upload.php';  /** load URL Upload page */
            ?>
        </div><!--#url_upload-->
        <div id="url_preview" class="pages">
            <?php
                include 'url_preview.php';  /** load URL Upload page */
            ?>
        </div><!--#url_preview-->
        <div id="url_download" class="pages">
            <?php
                include 'url_download.php';  /** load URL Upload page */
            ?>
        </div><!--#url_download-->
        <div id="user_management" class="pages">
            <?php
                //include 'user_management.php';  /** load URL Upload page */
                include 'users_management.php';  /** load URL Upload page */
            ?>
        </div><!--#user_management-->
    </div><!--#info-->
</div><!--.wrapper-->