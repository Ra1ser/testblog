<?php

class Main
{
    
    public static function start()
    {  
        $uri = $_SERVER['REQUEST_URI'];
        $uri = substr($uri, 1);
        if (DataBase::select_uri($uri) == 1) self::linkview()->action();
        else self::linkview()->notFound();
    }

    public function linkdatabase()
    {
        $database = new DataBase();
        return $database;
    }

    public function linkview()
    {
        $view = new View();
        return $view;
    }

    public static function crud_select($temp, $post, $uri)
    {
        self::linkdatabase()->recordView($temp);
        if (isset($post)) {
            if ($uri == "/")
            {

                $temp = self::linkdatabase()->selectNumberView();
                $select = self::linkdatabase()->select($post);
                while ($row = $select->fetch_assoc())
                {
                    if ($temp == 1) require $_SERVER['DOCUMENT_ROOT'] . '/tmp/grid.tpl';
                    if ($temp == 2) require $_SERVER['DOCUMENT_ROOT'] . '/tmp/list.tpl';
                }
            }
            elseif (DataBase::select_uri(substr($uri, 1)) == 0)require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/404.tpl';
            elseif((DataBase::select_uri(substr($uri, 1)) == 1))
            {
                $page = substr($uri, 1);
                require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/page.tpl';
            }
        }

        else header("Location: /");

    }

    public static function crud_delete($id_num)
    {
        self::linkdatabase()->delete($id_num);

    }

    public static function crud_save($title, $text, $image)
    {
        self::linkdatabase()->save($title, $text, $image);

    }

    public static function crud_update($id_num, $title, $text, $image)
    {
        self::linkdatabase()->update($id_num, $title, $text, $image);
    }

    public static function edit($id_num)
    {
        self::linkdatabase()->edit($id_num);
    }


}

