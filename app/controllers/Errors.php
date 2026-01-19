<?php

namespace controllers;

class Errors extends \libraries\Controller
{

    public function four(): void
    {
        $this->view('errors/errorPage');
    }
}


