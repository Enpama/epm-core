<?php
declare(strict_types = 1);
namespace epm\core\data;

class Model
{

    /** @var Definition $definition */
    public $definition;

    /** @var int $id */
    public $id = 0;

    /** @var int $lang_id */
    public $lang_id = 0;

    public function __construct(int $id = 0, int $lang_id = 0)
    {}

    public function constructByKey(string $dbKey, string $dbValue)
    {
    /**
     *
     * @todo to be implemented
     */
    }
}
