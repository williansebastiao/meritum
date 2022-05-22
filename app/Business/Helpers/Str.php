<?php


namespace App\Business\Helpers;


use Nette\Utils\Strings;

class Str
{
    /**
     * @param String $value
     * @return String
     */
    static function clearSpecialCharacters(String $value): String
    {
        if(!is_null($value)) {
            $str = str_replace('-', '', $value);
            return preg_replace('/[^A-Za-z0-9\-]/', '', $str);
        }
    }

    /**
     * @param String $mask
     * @param String $str
     * @return String
     */
    static function mask(String $mask, String $str): String
    {
        $str = str_replace(" ", "", $str);
        for ($i = 0; $i < strlen($str); $i++) {
            $mask[strpos($mask, "#")] = $str[$i];
        }
        return $mask;
    }
}
