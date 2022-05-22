<?php


namespace App\Business\Helpers;


class Str
{
    static function clearSpecialCharacters(String $value): String
    {
        if(!is_null($value)) {
            $str = str_replace('-', '', $value);
            return preg_replace('/[^A-Za-z0-9\-]/', '', $str);
        }
    }
}
