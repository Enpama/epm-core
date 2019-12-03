<?php
declare(strict_types = 1);
namespace epm\core\database;

use PDO;
use PDOException;

class MySQL extends Database
{

    private $pdo;

    public function __construct(string $server, string $name, string $user, string $password, string $prefix)
    {
        parent::__construct($server, $name, $user, $password, $prefix);

        try {
            $this->pdo = new PDO('mysql:host=' . $this->server . ';dbname=' . $this->name . ';charset=utf8', $this->user, $this->password);
        } catch (PDOException $e) {
            die('Database construction error');
        }
    }

    public function prepare(string $statement, array $options): Database
    {}

    public function prepareLast(): Database
    {}

    public function setFree()
    {}

    public function fetchAll(): array
    {}

    public function bindParam(string $parameter, string $variable, $type = 'string', $length = null, $options = null): Database
    {}

    public function execute(bool $debug): bool
    {}

    public function bindBool(string $parameter, bool $variable): Database
    {}

    public function bindFloat(string $parameter, float $variable): Database
    {}

    public function bindDouble(string $parameter, float $variable): Database
    {}

    public function fetch(): array
    {}

    public function bindString(string $parameter, string $variable): Database
    {}

    public function getExecutionTime(): float
    {}

    public function bindInt(string $parameter, int $variable): Database
    {}
}
