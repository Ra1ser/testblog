<?php

//Модель
class DataBase
{
    //Соединение с бд
    function connection()
    {
        $host = "localhost";
        $user = "root";
        $pass = "root";
        $base = "testblog";
        $connection = new mysqli($host, $user, $pass, $base) or die("База данных не обнаружена");
        return $connection;
    }

    //Удаление записи из бд и изображения из папки up_img
    public function delete($id_num)
    {
        if (isset($id_num))
        {
            $select = "SELECT * FROM note WHERE id_num = '$id_num'";
            $select = DataBase::connection()->query($select);
            $row = $select->fetch_array();
            unlink($_SERVER['DOCUMENT_ROOT']."/up_img/".$row['image']);
            self::connection()->query("DELETE FROM note WHERE id_num = '$id_num'");
        }
        self::connection()->close();
    }

    //Удаление неиспользуемых изображений из папки up_img
    public static function delete_images()
    {
        if ($open_dir = opendir($_SERVER['DOCUMENT_ROOT'] . '/up_img'))
        {
            while (($file = readdir($open_dir)) !== false)
            {
                if($file!='.' && $file!='..')
                {
                    $image[] = $file;
                }
            }
            closedir($open_dir);
        }

        if (!empty($image))
        {
            foreach ($image as $key => $value)
            {
                $select = "SELECT image FROM note WHERE image = '$value'";
                $select = DataBase::connection()->query($select);
                $row = $select->fetch_assoc();
                if($value != $row['image'])
                {
                    unlink($_SERVER['DOCUMENT_ROOT'].'/up_img/'.$value);
                }
            }
        }
        self::connection()->close();
    }
    //Редактирование
    public function edit($id_num)
    {
        if(isset($id_num))
        {
            $query = DataBase::connection()->query("SELECT * FROM note WHERE id_num ='$id_num'");
            $fetch = $query->fetch_array();
            $array = array('id_num' => $fetch['id_num'], 'title' => $fetch['title'], 'text' => $fetch['text']);
            echo json_encode($array);
        }
        else header("Location: /");
        self::connection()->close();
    }
    //Сохранение
    public function save($title, $text, $image)
    {
        $title = Functions::sanitize($title);
        $text = Functions::sanitize($text);
        $date = Functions::date_time();

        if (!empty($title) && !empty($text) && !empty($image))
        {
            self::connection()->query("INSERT INTO note VALUES('', '$title', '$text', '$image','$date')");
        }

        elseif (!empty($title) && !empty($text) && !empty($image))

        self::connection()->close();
    }

    //Обновление записи в столбце view, таблицы view
    public function recordView($temp)
    {
        if ($temp == 1 && isset($temp)) self::connection()->query("UPDATE view SET view = 1 ");
        elseif ($temp == 2 && isset($temp)) self::connection()->query("UPDATE view SET view = 2");
    }

    //Переключение вида grid/list
    public function selectNumberView()
    {
        $select = "SELECT * FROM view";
        $select = self::connection()->query($select);
        $row = $select->fetch_assoc();
        return $row['view'];

    }
    //Выборка записей из бд
    public function select($post)
    {

        if (isset($post))
        {
            $select = "SELECT * FROM note ORDER BY id_num DESC LIMIT {$post}";
            $select = self::connection()->query($select);
            return $select;
        }
        return self::connection()->close();
    }

    //Обновление
    public function update($id_num, $title, $text, $image)
    {
        $title = Functions::sanitize($title);
        $text = Functions::sanitize($text);
        $date = Functions::date_time();

        if (isset($id_num))
        {

            if(!empty($title) && !empty($text)&& !empty($image))
            {
                self::connection()->query("UPDATE note SET title = '$title', text = '$text',  image = '$image', datetime = '$date' WHERE id_num = '$id_num'");
            }

            elseif (!empty($title) && !empty($text)&& empty($image))
            {
                self::connection()->query("UPDATE note SET title = '$title', text = '$text', datetime = '$date' WHERE id_num = '$id_num'");
            }
            
        }

        self::connection()->close();
    }
    //Проверка адреса
    public static function select_uri($uri)
    {
        $select = "SELECT * FROM note WHERE id_num = '$uri'";
        $select = self::connection()->query($select);
        $row = $select->fetch_array();
        if ($uri == $row['id_num']) return 1;
        else return 0;
    }
    //Выборка страницы
    public static function page($id, $num)
    {
        $select = "SELECT * FROM note WHERE id_num = '$id'";
        $select = self::connection()->query($select);
        $row = $select->fetch_array();
        switch ($num)
        {
            case 1: return $row['title'];break;
            case 2: return $row['text'];break;
            case 3: return $row['image'];break;
            case 4: return $row['datetime'];break;
        }
    }
}