<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;
use epm\type\LString;

class ProductAttribute extends Model
{

    /**
     *
     * @var LString $name
     */
    public $name = null;

    /**
     *
     * @var string $code
     */
    public $code = '';

    /**
     *
     * @var bool $filters
     */
    public $filters = false;
}
