<?php
namespace libraries;

class Core {
    protected  $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
//        print_r($this->getUrl());
        $url=$this->getUrl();
        if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
            //with title case i reallyu need to name classes titlecase
            $this->currentController = ucwords($url[0]);
            //unset0 index
            unset($url[0]);
        }

        //requir the controller
        require_once '../app/controllers/'.$this->currentController.'.php';
        //instaniate the controller class , now the current controller has string value but we need to give it a data type of that class so
        $this->currentController = new $this->currentController;
        if(isset($url[1])){
            if(method_exists($this->currentController,$url[1])){
                $this->currentMethod =$url[1];
                //unset function
                unset($url[1]);
            } else {
                $this->currentController = new \controllers\Errors();
                $this->currentMethod = 'four';
            }
        }


        //get parametres /pages/ticket/1 for exemple

        $this->params = $url ? array_values($url) : [];

        // call a callback with array of parameters
        call_user_func_array([$this->currentController,$this->currentMethod], $this->params);


    }



    public function getUrl(){
        if (isset($_GET['url'])){
            $url=rtrim($_GET['url'],'/');
            $url=filter_var($url,FILTER_SANITIZE_URL);
            return explode('/',$url);
        }
    }


}