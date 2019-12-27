<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class City extends Model
{

    /**
     *
     * @var string
     */
    public $name = '';

    /**
     *
     * @var string
     */
    public $code = '';

    /**
     *
     * @var Town[]
     */
    public $towns = array();
}
