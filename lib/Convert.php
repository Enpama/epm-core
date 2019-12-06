<?php
declare(strict_types = 1);
namespace epm\lib;

class Convert
{

    public static function toDouble(string $num): float
    {
        $dot_index = \strpos($num, '.');
        $comma_index = \strpos($num, ',');

        if ($dot_index > 0 && $comma_index > 0) {
            if ($dot_index > $comma_index) {
                $num = \str_replace(',', '', $num);
            } else {
                $num = \str_replace('.', '', $num);
                $num = \str_replace(',', '.', $num);
            }
        } else if ($dot_index > 0) {
            return (float) $num;
        } else if ($comma_index > 0) {
            $num = \str_replace(',', '.', $num);
        }

        return (float) $num;
    }

    public static function toFloat(string $num): float
    {
        return self::toDouble($num);
    }

    public static function toBool($val): bool
    {
        if ($val === '') {
            return false;
        }
        $data = array(
            0 => false,
            1 => true,
            'true' => true,
            'false' => false,
            true => true,
            false => false
        );

        if (isset($data[$val])) {
            return $data[$val];
        }

        return false;
    }
}
