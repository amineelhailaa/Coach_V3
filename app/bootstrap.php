<?php
//load config
require_once 'config/config.php';


// load libraries
spl_autoload_register(function ($className){
    $filePath = __DIR__.'/'.str_replace('\\','/',$className).".php";

    if(file_exists($filePath)){
        require_once  $filePath;
    }
});




use models\{Coach,Sportif,User};
use repositories\{coachRepository,sportifRepository,UserRepository};
use libraries\{Controller,Core,Database};
use services\{Authentication,RoleLogic,UploadPic};

