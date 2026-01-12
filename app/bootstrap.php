<?php
//load config
require_once 'config/config.php';


// load libraries
spl_autoload_register(function ($className){
    require_once __DIR__."/libraries/".$className.".php";
});