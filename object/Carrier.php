<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;
use epm\type\LString;

class Carrier extends Model
{

    /**
     *
     * @var string $name
     */
    public $name = '';

    /**
     *
     * @var string $logo
     */
    public $logo = '';

    /**
     *
     * @var string $url
     */
    public $url = '';

    /**
     *
     * @var string $currency
     */
    public $currency = '';

    /**
     *
     * @var float $price_initial
     */
    public $price_initial = 0;

    /**
     *
     * @var float $price_perweight
     */
    public $price_perweight = 0;

    /**
     *
     * @var float $price_perdesi
     */
    public $price_perdesi = 0;

    /**
     *
     * @var LString $note
     */
    public $note = null;

    /**
     *
     * @var LString $delivery_time
     */
    public $delivery_time = null;

    /**
     *
     * @var bool $active
     */
    public $active = false;
}
