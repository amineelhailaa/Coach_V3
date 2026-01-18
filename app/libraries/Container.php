<?php

namespace libraries;
use \libraries\Database;
use \repositories\{UserRepository,coachRepository,sportifRepository};
use models\{Coach,Sportif,User};
use services\{Authentication,RoleLogic,UploadPic};

class Container
{
    private $instances= [];

    public function __construct(){}

    public function get(string $className)
    {
        if (isset($this->instances[$className])){
            return $this->instances;
        }
        $obj = $this->build($className);
        $this->instances[$className] = $obj;
        return $obj;
    }


    public function build($className)
    {
        switch ($className){
            case 'Database':
                return new \libraries\Database();
            case 'UserRepository':
                return new UserRepository($this->get('Database'));
            case 'coachRepository':
                return new coachRepository($this->get('Database'));
            case 'sportifRepository':
                return new sportifRepository($this->get('Database'));
            case 'Validator':
                return new validator(); ///soon
        }
    }
}