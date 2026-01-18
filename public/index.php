<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../app/bootstrap.php";
require APPROOT.'/views/inc/header.php';

$core = new \libraries\Core();


require APPROOT.'/views/inc/footer.php';
