<?php
declare(strict_types = 1);
namespace epm\database;

use epm\lib\Settings;

class ConnectionManager
{

    /**
     *
     * @var Connection[] $InstanceList
     */
    private static $InstanceList = array();

    public static function get(): Connection
    {
        foreach (self::$InstanceList as $k => $instance) {
            if ($instance->isFree) {
                $instance->isFree = false;
                return self::$InstanceList[$k];
            }
        }

        $func = 'get' . Settings::get('database.type');
        $tmp = \call_user_func('\epm\database\ConnectionManager::' . $func);
        self::$InstanceList[] = $tmp;
        return $tmp;
    }

    public static function getMySQL(): Connection
    {
        return new Connection(Connection::MYSQL, Settings::get('database.server'), Settings::get('database.name'),
            Settings::get('database.user'), Settings::get('database.password'), Settings::get('database.prefix'));
    }
}
