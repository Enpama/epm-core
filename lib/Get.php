<?php
declare(strict_types = 1);
namespace epm\lib;

class Get
{

    public static function fromPost(string $key, string $default_value = ''): string
    {
        if (empty($key) || ! \is_string($key)) {
            return '';
        }
        $value = isset($_POST[$key]) ? $_POST[$key] : $default_value;
        if (\is_string($value)) {
            return \urldecode(\preg_replace('/((\%5C0+)|(\%00+))/i', '', \urlencode($value)));
        }
        return $value;
    }

    public static function fromGet(string $key, string $default_value = ''): string
    {
        if (empty($key) || ! \is_string($key)) {
            return '';
        }
        $value = isset($_GET[$key]) ? $_GET[$key] : $default_value;
        if (\is_string($value)) {
            return \urldecode(\preg_replace('/((\%5C0+)|(\%00+))/i', '', \urlencode($value)));
        }
        return $value;
    }

    public static function fromMultiplePost(string $prefix = '', bool $cutPrefix = true, bool $integerIndex = false): array
    {
        $ret = array();

        foreach ($_POST as $k => $v) {
            if (Str::startsWith($k, $prefix)) {
                if (\is_string($v) === true) {
                    $v = \urldecode(\preg_replace('/((\%5C0+)|(\%00+))/i', '', urlencode($v)));
                }
                if ($cutPrefix && strlen($prefix) > 0) {
                    $k = \str_replace($prefix, '', $k);
                    if ($integerIndex) {
                        $k = (int) $k;
                    }
                }
                $ret[$k] = $v;
            }
        }

        return $ret;
    }
}
