<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class Town extends Model
{

    /**
     *
     * @var string
     */
    public $name = '';

    /**
     *
     * @var int
     */
    public $city_id = 0;
}
