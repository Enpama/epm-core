<?php
declare(strict_types = 1);
namespace epm\database;

use PDO;
use epm\lib\StringManipulation;

class MySQL extends Database
{

    /**
     *
     * @var \PDO $pdo
     */
    private $pdo;

    /**
     *
     * @var \PDOStatement $statement
     */
    private $statement;

    public function __construct(string $server, string $name, string $user, string $password, string $prefix)
    {
        parent::__construct($server, $name, $user, $password, $prefix);

        $this->pdo = new PDO('mysql:host=' . $this->server . ';dbname=' . $this->name . ';charset=utf8', $this->user,
            $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function prepare(string $statement, array $options): Database
    {
        $this->statement = $this->pdo->prepare($statement, $options);
        return $this;
    }

    public function prepareLast(): Database
    {
        return $this->prepare($this->lastQuery);
    }

    public function setFree()
    {
        $this->is_free = true;
    }

    public function setInUse()
    {
        $this->is_free = false;
    }

    public function fetch(): array
    {
        return $this->statement->fetch();
    }

    public function fetchAll(): array
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function bindParam(string $parameter, string $variable, $type = \PDO::PARAM_STR, $length = null,
        $options = null): Database
    {
        if (StringManipulation::startsWith($parameter, ':')) {
            $parameter = ':' . $parameter;
        }
        $this->statement->bindParam($parameter, $variable, $type, $length, $options);

        return $this;
    }

    public function execute(bool $debug): bool
    {
        $start = microtime(true);
        if ($debug) {
            // echo '<div>' . $this->statement->debugDumpParams() . '</div>';
        }
        $e = $this->statement->execute(null);
        $this->execution_time = microtime(true) - $start;
        return $e;
    }

    public function bindBool(string $parameter, bool $variable): Database
    {
        return $this->bindParam($parameter, $variable, PDO::PARAM_BOOL);
    }

    public function bindFloat(string $parameter, float $variable): Database
    {
        return $this->bindDouble($parameter, $variable);
    }

    public function bindDouble(string $parameter, float $variable): Database
    {
        $var = (float) $variable;
        return $this->bindParam($parameter, $var, PDO::PARAM_STR);
    }

    public function bindString(string $parameter, string $variable): Database
    {
        $var = $variable !== null ? $variable : '';
        return $this->bindParam($parameter, $var, PDO::PARAM_STR);
    }

    public function getExecutionTime(): float
    {
        return $this->execution_time;
    }

    public function bindInt(string $parameter, int $variable): Database
    {
        $var = (int) $variable;
        return $this->bindParam($parameter, $var, PDO::PARAM_INT);
    }
}
