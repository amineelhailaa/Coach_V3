<?php
//load config
require_once 'config/config.php';


// load libraries
spl_autoload_register(function ($className){
    require_once __DIR__.'/'.str_replace('\\','/',$className).".php";
});




use models\{Coach,Sportif,User};
use repositories\{coachRepository,sportifRepository,UserRepository};
use libraries\{Controller,Core,Database};
use services\{Authentication,RoleLogic,UploadPic};
use controllers\{Pages,Users};

