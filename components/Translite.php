<?php

namespace app\components;

class Translite {

    public static function Generate($string, $attempt = 0, $replace = array(), $delimiter = '-') {

//setlocale(LC_ALL, 'en_US.UTF8');
        if (!empty($replace)) {
            $string = str_replace((array) $replace, ' ', $string);
        }

        $replace_translit = array(
            "'" => "",
            "`" => "",
            "а" => "a", "А" => "a",
            "б" => "b", "Б" => "b",
            "в" => "v", "В" => "v",
            "г" => "g", "Г" => "g",
            "д" => "d", "Д" => "d",
            "е" => "e", "Е" => "e",
            "ё" => "yo", "Ё" => "yo",
            "ж" => "zh", "Ж" => "zh",
            "з" => "z", "З" => "z",
            "и" => "i", "И" => "i",
            "й" => "y", "Й" => "y",
            "к" => "k", "К" => "k",
            "л" => "l", "Л" => "l",
            "м" => "m", "М" => "m",
            "н" => "n", "Н" => "n",
            "о" => "o", "О" => "o",
            "п" => "p", "П" => "p",
            "р" => "r", "Р" => "r",
            "с" => "s", "С" => "s",
            "т" => "t", "Т" => "t",
            "у" => "u", "У" => "u",
            "ф" => "f", "Ф" => "f",
            "х" => "h", "Х" => "h",
            "ц" => "c", "Ц" => "c",
            "ч" => "ch", "Ч" => "ch",
            "ш" => "sh", "Ш" => "sh",
            "щ" => "sch", "Щ" => "sch",
            "ъ" => "", "Ъ" => "",
            "ы" => "y", "Ы" => "y",
            "ь" => "", "Ь" => "",
            "э" => "e", "Э" => "e",
            "ю" => "yu", "Ю" => "yu",
            "я" => "ya", "Я" => "ya",
            "і" => "i", "І" => "i",
            "ї" => "yi", "Ї" => "yi",
            "є" => "ie", "Є" => "ie"
        );


        //$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = strtr($string, $replace_translit);
        $clean = preg_replace("/[^a-zA-Z0-9\_\s\-]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        //$clean = preg_replace("/[\_|+ -]+/", $delimiter, $clean);
        $clean = preg_replace("/[\s]+/", $delimiter, $clean);

        if ($attempt > 0)
            $clean .= $delimiter . $attempt;

        return $clean;
    }

}
