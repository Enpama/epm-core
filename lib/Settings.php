<?php
declare(strict_types = 1);
namespace epm\lib;

use epm\exceptions\SettingsNotFound;

class Settings
{

    /**
     *
     * @var Settings $instance
     */
    private static $instance = null;

    private $file = 'settings.inc.php';

    private $data = array();

    public function __construct()
    {
        $this->data = require (__DIR__ . '../../' . $this->file);
    }

    public function getvalue(string $key): string
    {
        $parsed = explode('.', $key);
        $i = 0;
        $tmp = $this->data;
        if (\count($parsed) === 0) {
            return '';
        }
        $error = count($parsed);

        if (! \is_array($tmp) || \count($tmp) === 0) {
            return '';
        }

        while ($i < $error) {
            if (! \is_array($tmp)) {
                throw new SettingsNotFound('Cannot find [' . $key . ']');
            }
            if (\array_key_exists($parsed[$i], $tmp)) {
                $tmp = $tmp[$parsed[$i]];
                $i ++;
            } else {
                return '';
            }
        }

        return $tmp;
    }

    public static function get(string $key): string
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->getvalue($key);
    }
}
