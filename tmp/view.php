<?php

class View
{

    public function action()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/main.tpl';
    }
    
    public function notFound()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/404.tpl';
    }
}


