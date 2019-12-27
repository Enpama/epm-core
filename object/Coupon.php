<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class Coupon extends Model
{

    /**
     *
     * @var integer
     */
    public $user_id = 0;

    /**
     *
     * @var string
     */
    public $name = '';

    /**
     *
     * @var string
     */
    public $description = '';

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
     * @var float
     */
    public $value = 0.0;

    /**
     *
     * @var string
     */
    public $value_currency = '';

    /**
     *
     * @var bool
     */
    public $value_before_tax = false;

    /**
     *
     * @var float
     */
    public $threshold = 0.0;

    /**
     *
     * @var bool
     */
    public $threshold_before_tax = false;

    /**
     *
     * @var bool
     */
    public $threshold_before_carrier = false;

    /**
     *
     * @var string
     */
    public $threshold_currency = '';

    /**
     *
     * @var bool
     */
    public $cumulable = false;

    /**
     *
     * @var \DateTime
     */
    public $date_start = null;

    /**
     *
     * @var \DateTime
     */
    public $date_end = null;

    /**
     *
     * @var \DateTime
     */
    public $date_add = null;

    /**
     *
     * @var \DateTime
     */
    public $date_update = null;

    /**
     *
     * @var bool
     */
    public $active = false;

    /**
     *
     * @var bool
     */
    public $used = false;

    /**
     *
     * @var bool
     */
    public $free_carrier = false;

    /**
     *
     * @var bool
     */
    public $free_gift = false;

    /**
     *
     * @var bool
     */
    public $deleted = false;

    /**
     *
     * @var integer
     */
    public $quantity = 0;

    /**
     *
     * @var integer
     */
    public $allowed_per_user = 1;

    /**
     *
     * @var CouponRule[]
     */
    public $rules = array();
}
