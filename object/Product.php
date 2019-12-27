<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;
use epm;

class Product extends Model
{

    const REDUCTION_RATE = 1;

    const REDUCTION_VALUE = 2;

    const REDUCTION_MANIPULATE = 3;

    const REDUCTION_FIXED = 4;

    const CARRIER_WEIGHT = 1;

    const CARRIER_DESI = 2;

    const CARRIER_FREE = 3;

    const STANDART = 1;

    const VIRTUAL = 2;

    const SINGLE = 1;

    const SEPERATE = 2;

    /**
     *
     * @var string
     */
    public $code = '';

    /**
     *
     * @var int
     */
    public $type = self::STANDART;

    /**
     *
     * @var integer
     */
    public $status_id = 0;

    /**
     *
     * @var bool
     */
    public $active = false;

    /**
     *
     * @var string
     */
    public $barcode = '';

    /**
     *
     * @var integer
     */
    public $category_id = 0;

    /**
     *
     * @var integer
     */
    public $brand_id = 0;

    /**
     *
     * @var float
     */
    public $weight = 0.0;

    /**
     *
     * @var float
     */
    public $desi = 0.0;

    /**
     *
     * @var int
     */
    public $carrier_price_type = self::CARRIER_DESI;

    /**
     *
     * @var integer
     */
    public $stock = 0;

    /**
     *
     * @var float
     */
    public $price = 0.0;

    /**
     *
     * @var float
     */
    public $extra_cost = 0.0;

    /**
     *
     * @var float
     */
    public $profit = 0.0;

    /**
     *
     * @var float
     */
    public $market_price = 0.0;

    /**
     *
     * @var float
     */
    public $display_price = 0.0;

    /**
     *
     * @var int
     */
    public $reduction_type = self::REDUCTION_RATE;

    /**
     *
     * @var float
     */
    public $reduction_value = 0.0;

    /**
     *
     * @var \DateTime
     */
    public $reduction_strat = null;

    /**
     *
     * @var \DateTime
     */
    public $reduction_end = null;

    /**
     *
     * @var bool
     */
    public $reduction_limitless = false;

    /**
     *
     * @var bool
     */
    public $reduction_show = false;

    /**
     *
     * @var string
     */
    public $supplier_link = '';

    /**
     *
     * @var string
     */
    public $supplier_code = '';

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
     * @var \DateTime
     */
    public $date_index = null;

    /**
     *
     * @var string
     */
    public $currency_code = '';

    /**
     *
     * @var integer
     */
    public $tax_id = 0;

    /**
     *
     * @var bool
     */
    public $installment = false;

    /**
     *
     * @var epm\type\LString
     */
    public $name = null;

    /**
     *
     * @var epm\type\LString
     */
    public $description = null;

    /**
     *
     * @var epm\type\LString
     */
    public $description_short = null;

    /**
     *
     * @var epm\type\LString
     */
    public $keywords = null;

    /**
     *
     * @var epm\type\LString
     */
    public $rewrite = null;

    /**
     *
     * @var epm\type\LString
     */
    public $title = null;

    /**
     *
     * @var epm\type\LString
     */
    public $video_url = null;

    /**
     *
     * @var int
     */
    public $combination_stock_type = self::SEPERATE;

    /**
     *
     * @var integer
     */
    public $delivery_time = 0;

    /**
     *
     * @var integer
     */
    public $view = 0;

    /**
     *
     * @var integer
     */
    public $employee_id = 0;
}
