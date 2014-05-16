<?php
/**
 *************************************************
 ** File: dbmanager.php  **
 ** Date: 03.05.2014     **
 ** Time: 12:33 AM    **
 ** @author Hovhannes Matevosyan **
 ** Description: This file connect different parts of whole code and makes a one single template  **
 *************************************************
 */


    if($main_content != "login_form")
    {
        $this->load->view('includes/header');

        $this->load->view('includes/navigation');
    }
    else
    {
        $this->load->view('includes/login-header');
    }
    // to store content as a variable
    $this->load->view($main_content);

    $this->load->view('includes/footer');