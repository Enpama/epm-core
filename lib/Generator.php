<?php
declare(strict_types = 1);
namespace epm\lib;

class Generator
{

    public static function random(int $length = 16): string
    {
        return Str::random($length);
    }

    public static function randomHex(int $len = 16): string
    {
        $res = '';
        for ($i = 0; $i < $len; $i ++) {
            $res .= \dechex(\mt_rand(0, 16));
        }

        return $res;
    }

    public static function code(int $blockSize = 4, int $blockCount = 3, string $seperator = '-'): string
    {
        $res = array();
        $abc = 'ERTYUPASDFGHJKLZCVBNM123456789';
        for ($i = 0; $i < $blockCount; $i ++) {
            for ($j = 0; $j < $blockSize; $j ++) {
                $res[] = \substr($abc, \mt_rand(0, \strlen($abc) - 1), 1);
            }
        }

        return \implode($seperator, $res);
    }
}
