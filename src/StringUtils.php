<?php

declare(strict_types=1);

namespace Taured\CommonLibs;

class StringUtils
{
    public function __construct()
    {
    }

    public function sanitizeString(string $string, int $maxLength = 40): string
    {
        $replace_chars = array(
            'Š' => 'S', 'š' => 's', 'Ð' => 'Dj','Ž' =>  'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
            'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' =>  'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I',
            'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' =>  'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U',
            'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' =>  'B', 'ß' => 'Ss','à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
            'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' =>  'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i',
            'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' =>  'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u',
            'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' =>  'y', 'þ' => 'b', 'ÿ' => 'y', 'ƒ' => 'f'
        );
        $f =  strtr($string, $replace_chars);
        $f = preg_replace(array('/[\&]/', '/[\@]/', '/[\#]/'), array('-y-', '-de-', '-numero-'), $f);
        $f = preg_replace('/[^(\x20-\x7F)]*/', '', $f);
        $f = str_replace(' ', '-', $f);
        $f = str_replace('\'', '', $f);
        $f = preg_replace('/[^\w\-\.]+/', '', $f);
        $f = preg_replace('/[\-]+/', '-', $f);
        $f = substr($f, 0, $maxLength);

        return $f;
    }
}
