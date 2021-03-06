<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta name="description" content="Custom PHP Website - Designed to manage URLs - Also Integrate third party API - Net Futures">
    <meta name="keywords" content="PHP, URLs, API Development, Net Futures">
    <meta name="author" content="Hovhannes Matevosyan">
    <meta charset="UTF-8">
    <title>Manage URLs</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/style.css" type="text/css" media="screen" charset="utf-8"/>

    <!-- css & javascript links for a three in 'User Management' page-->
    <link rel="stylesheet" href="http://checkboxtree.googlecode.com/svn/trunk/jquery.checkboxtree.css" />
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />

    <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js" type="text/javascript" ></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>

    <!-- css & javascript links for a three in 'User Management' page-->
    <script src="http://checkboxtree.googlecode.com/svn/trunk/jquery.checkboxtree.js"></script>

    <!-- include jquery files to read uploaded .CSV files-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
    <script src="http://cdn.jsdelivr.net/tablesorter/2.17.0/js/jquery.tablesorter.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.finderselect/0.6.0/jquery.finderselect.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery-zclip-master/jquery.zclip.js"></script>
 </head>
<body>
<header>
    <div id="head">
        <div id="one">
            <a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Logo" />
            </a>
        </div>
        <div id="two">
            <h2>Web Site Header</h2>
        </div>
        <div id="three"><a href="<?php echo base_url()."login/logout"; ?>">Log Out</a> | <a href="#">Contact Us</a></div>
    </div><!--#head-->