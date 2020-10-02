<?

class Functions 
{
    //Функция замены строки для UTF-8
    private function mb_substr_replace($string, $replacement, $start, $length=null, $encoding=null)
    {
        if ($encoding == null) $encoding = mb_internal_encoding();
        if ($length == null) return mb_substr($string, 0, $start, $encoding) . $replacement;
        else
        {
            if($length < 0) $length = mb_strlen($string, $encoding) - $start + $length;
            return mb_substr($string, 0, $start, $encoding). $replacement . mb_substr($string, $start + $length, mb_strlen($string, $encoding), $encoding);
        }
    }

    //Функция замены строки
    public static function string_replace($string, $int)
    {
        if (strlen($string) > $int) $string = Functions::mb_substr_replace($string, ' ...' ,$int);
        else $string;
        return $string;
    }

    //Функция удаления вредоносного кода
    public static function sanitize($string)
    {
        $string = stripslashes($string);
        $string = strip_tags($string);
        $string = htmlspecialchars($string);
        $string = htmlentities($string);
        return $string;
    }
    //Функция даты
    public static function date_time()
    {
        date_default_timezone_set("Asia/Vladivostok");
        $date = date("Y-m-d H:i:s");
        return $date;
    }

    public static function link()
    {
        require_once 'lib_db/database.php';
        require_once 'controller/main.php';
        require_once 'tmp/view.php';
    }

}






