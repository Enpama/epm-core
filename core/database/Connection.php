<?php
declare(strict_types = 1);

namespace epm\core\database;

class Connection implements ConnectionInterface
{

    public function __construct()
    {}

    public function prepare(string $statement, array $options): Connection
    {}

    public function prepareLast(): Connection
    {}

    public function setFree()
    {}

    public function fetchAll(): array
    {}

    public function bindParam(string $parameter, string $variable, $type = 'string', $length = null, $options = null): Connection
    {}

    public function execute(bool $debug): bool
    {}

    public function bindBool(string $parameter, bool $variable): Connection
    {}

    public function bindFloat(string $parameter, float $variable): Connection
    {}

    public function bindDouble(string $parameter, float $variable): Connection
    {}

    public function fetch(): array
    {}

    public function bindString(string $parameter, string $variable): Connection
    {}

    public function getExecutionTime(): float
    {}

    public function bindInt(string $parameter, int $variable): Connection
    {}
}
