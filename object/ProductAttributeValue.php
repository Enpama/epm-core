<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;
use epm\type\LString;

class ProductAttributeValue extends Model
{

    /**
     *
     * @var int $name
     */
    public $product_attribute_id = 0;

    /**
     *
     * @var string $value
     */
    public $value = '';
}
