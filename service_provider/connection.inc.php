<?php
    session_start();
    $con= mysqli_connect(
        "localhost",
        "root",
        "",
        "lendyhand");

define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/001085620/');
define('SITE_PATH','http://localhost/001085620/');

define('SERVICE_IMAGE_SERVER_PATH',SERVER_PATH.'media/service/');
define('SERVICE_IMAGE_SITE_PATH',SITE_PATH.'media/service/');






?>