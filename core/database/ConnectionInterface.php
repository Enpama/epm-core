<?php
declare(strict_types = 1);
namespace epm\core\database;

interface ConnectionInterface
{

    public function prepare(string $statement, array $options): Connection;

    public function prepareLast(): Connection;

    public function execute(bool $debug): bool;

    public function getExecutionTime(): float;

    public function fetchAll(): array;

    public function fetch(): array;

    public function setFree();

    public function bindParam(string $parameter, string &$variable, $type = 'string', $length = null, $options = null): Connection;

    public function bindInt(string $parameter, int &$variable): Connection;

    public function bindDouble(string $parameter, float &$variable): Connection;

    public function bindFloat(string $parameter, float &$variable): Connection;

    public function bindString(string $parameter, string &$variable): Connection;

    public function bindBool(string $parameter, bool &$variable): Connection;
}
