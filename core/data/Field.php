<?php

declare(strict_types=1);

namespace epm\core\data;

class Field
{
    const INT = 'int';
    const TINYINT = 'tinyint';
    const SMALLINT = 'smallint';
    const MEDIUMINT = 'mediumint';
    const BIGINT = 'bigint';
    const FLOAT = 'float';
    const DOUBLE = 'double';
    const DATETIME = 'datetime';
    const DATE = 'date';
    const TIMESTAMP = 'timestamp';
    const DECIMAL = 'decimal';
    const CHAR = 'char';
    const VARCHAR = 'varchar';
    const BINARY = 'binary';
    const BLOB = 'blob';
    const MEDIUMBLOB = 'mediumblob';
    const LONGBLOB = 'longblob';
    const TINYTEXT = 'tinytext';
    const TEXT = 'text';
    const MEDIUMTEXT = 'mediumtext';
    const LONGTEXT = 'longtext';
    const ENUM = 'enum';
    const BOOL = 'bool';

    /** @var string $key */
    public $key;
    /** @var string $type */
    public $type;
    /** @var bool $is_multilingual */
    public $is_multilingual = false;
    /** @var int $length */
    public $length = -1;
    /** @var bool $can_be_null */
    public $can_be_null = false;
    /** @var bool $auto_increment */
    public $auto_increment = false;
    /** @var bool $is_signed */
    public $is_signed = false;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            if (\property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}
