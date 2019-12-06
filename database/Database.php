<?php
declare(strict_types = 1);
namespace epm\database;

abstract class Database implements DatabaseInterface
{

    /**
     *
     * @var bool $is_free
     */
    public $is_free = true;

    /**
     *
     * @var string $last_query
     */
    public $last_query;

    /**
     *
     * @var string $table_prefix
     */
    public $table_prefix;

    /**
     *
     * @var string $server
     */
    public $server;

    /**
     *
     * @var string $user
     */
    public $user;

    /**
     *
     * @var string $password
     */
    public $password;

    /**
     *
     * @var string $name
     */
    public $name;

    /**
     *
     * @var float $execution_time
     */
    public $execution_time = 0.0;

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
