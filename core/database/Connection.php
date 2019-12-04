<?php
declare(strict_types = 1);
namespace epm\core\database;

class Connection
{

    const MYSQL = 0;

    const NEO4J = 1;

    const FILE = 2;

    const MEMORY = 3;

    /**
     *
     * @var int $database_type
     */
    private $database_type;

    private $database;

    public function __construct($database_type = self::MYSQL, string $server, string $name, string $user,
        string $password, string $prefix)
    {
        $this->database_type = $database_type;

        if ($this->database_type === self::MYSQL) {
            $this->database = new MySQL($server, $name, $user, $password, $prefix);
        }
    }
}
