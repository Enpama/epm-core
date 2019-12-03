<?php
declare(strict_types = 1);
namespace epm\core\database;

abstract class Database implements DatabaseInterface
{

    public $is_free = true;

    public $last_query;

    public $table_prefix;

    public $server;

    public $user;

    public $password;

    public $name;

    public function __construct(string $server, string $name, string $user, string $password, string $prefix)
    {
        $this->server = $server;
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
        $this->table_prefix = $prefix;
        $this->last_query = '';
        $this->is_free = false;
    }
}
