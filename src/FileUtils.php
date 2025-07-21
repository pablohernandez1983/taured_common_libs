<?php

declare(strict_types=1);

namespace Taured\CommonLibs;

class FileUtils
{
    public function __construct()
    {
    }

    public function swap(string $path, array $values): string
    {

        foreach ($values as $key => $value) {
            $count = 0;
            $strReplace = str_replace("{" . $key . "}", $value, $path, $count);
            if ($count > 0) {
                $path = $strReplace;
            }
        }
        return $path;
    }
}
