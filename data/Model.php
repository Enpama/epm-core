<?php
declare(strict_types = 1);
namespace epm\data;

abstract class Model implements ModelInterface
{

    /** @var Definition $definition */
    public $definition;

    /** @var int $id */
    public $id = 0;

    /** @var int $lang_id */
    public $lang_id = 0;

    public function __construct(int $id = 0, int $lang_id = 0)
    {
        $this->id = $id;
        $this->lang_id = $lang_id;
    }

    public function load(array $data)
    {
        $this->id = (int) $data['id'];
        $this->lang_id = (int) $data['lang_id'];
    }
}
