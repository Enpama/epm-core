<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class Cart extends Model
{

    /**
     *
     * @var integer
     */
    public $carrier_id = 0;

    /**
     *
     * @var integer
     */
    public $delivery_address_id = 0;

    /**
     *
     * @var integer
     */
    public $invoice_address_id = 0;

    /**
     *
     * @var integer
     */
    public $user_id = 0;

    /**
     *
     * @var string
     */
    public $recyclable = false;

    /**
     *
     * @var bool
     */
    public $gift = false;

    /**
     *
     * @var string
     */
    public $gift_message = '';

    /**
     *
     * @var string
     */
    public $notes = '';

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
    public $is_mobile = false;

    /**
     *
     * @var CartProduct[]
     */
    public $products = array();

    /**
     *
     * @var Coupon[]
     */
    public $coupons = array();

    /**
     *
     * @var SaleOptions[]
     */
    public $sale_options = array();
}
