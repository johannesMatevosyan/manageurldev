<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/25/14
 * Time: 9:56 AM
 * To change this template use File | Settings | File Templates.
 */

$config['roles'] = array('user', 'blogger', 'editor', 'umpire', 'admin');

$config['permission'] = array(

    'users' => array(
        'add' => array('admin'),
        'edit own' => array('blogger', 'editor', 'admin'),
        'edit all' => array('editor', 'admin'),
        'delete own' => array('blogger', 'editor', 'admin'),
        'delete all' => array('editor', 'admin'),
    ),
    'umpires' => array(
        'add' => array('admin'),
        'edit own' => array('umpire', 'admin'),
        'edit all' => array('admin'),
        'delete own' => array('umpire', 'admin'),
        'delete all' => array('editor', 'admin'),
    ),
    'cricket' => array(
        'add' => array('admin'),
        'edit own' => array(),
        'edit all' => array('umpire', 'admin'),
        'delete own' => array(),
        'delete all' => array('umpire', 'admin'),
    ),
);