<?php
declare(strict_types = 1);
namespace epm\database;

interface DatabaseInterface
{

    public function __construct(string $server, string $name, string $user, string $password, string $prefix);

    public function prepare(string $statement, array $options): Database;

    public function prepareLast(): Database;

    public function execute(bool $debug): bool;

    public function getExecutionTime(): float;

    public function fetchAll(): array;

    public function fetch(): array;

    public function setFree();

    public function bindParam(string $parameter, string $variable, $type = 'string', $length = null, $options = null): Database;

    public function bindInt(string $parameter, int $variable): Database;

    public function bindDouble(string $parameter, float $variable): Database;

    public function bindFloat(string $parameter, float $variable): Database;

    public function bindString(string $parameter, string $variable): Database;

    public function bindBool(string $parameter, bool $variable): Database;
}
