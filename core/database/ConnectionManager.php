<?php
declare(strict_types = 1);
namespace epm\core\database;

class ConnectionManager
{

    /**
     *
     * @var Connection[] $InstanceList
     */
    private static $InstanceList = array();

    public static function getMySQL()
    {
        foreach (self::$InstanceList as $k => $instance) {
            if ($instance->isFree) {
                $instance->isFree = false;

                return self::$InstanceList[$k];
            }
        }
        $tmp = new Connection(Connection::MYSQL);

        self::$InstanceList[] = $tmp;

        return $tmp;
    }
}
