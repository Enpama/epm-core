<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class Currency extends Model
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
     * @var string
     */
    public $sign = '';

    /**
     *
     * @var float
     */
    public $value = 1;

    /**
     *
     * @var string
     */
    public $cent = '';
}
