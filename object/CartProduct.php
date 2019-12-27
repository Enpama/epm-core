<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class CartProduct extends Model
{

    /**
     *
     * @var integer
     */
    public $product_id = 0;

    /**
     *
     * @var integer
     */
    public $quantity = 0;

    /**
     *
     * @var integer
     */
    public $combination_id = 0;

    /**
     *
     * @var integer
     */
    public $pos = 0;

    /**
     *
     * @var Product
     */
    public $product;
}
