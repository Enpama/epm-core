<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class ProductFeatureValue extends Model
{

    /**
     *
     * @var integer
     */
    public $feature_id = 0;

    /**
     *
     * @var epm\type\LString
     */
    public $value = null;
}
