<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class ProductFeature extends Model
{

    const NONE = 0;

    const COLOR = 1;

    /**
     *
     * @var string
     */
    public $code = '';

    /**
     *
     * @var integer
     */
    public $type = 0;

    /**
     *
     * @var epm\type\LString
     */
    public $name = null;

    /**
     *
     * @var ProductFeatureValue[]
     */
    public $values = array();
}
