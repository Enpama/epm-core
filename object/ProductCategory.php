<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;
use epm\type\LString;

class ProdductCategory extends Model
{

    /**
     *
     * @var int $parent
     */
    public $parent;

    /**
     *
     * @var bool $active
     */
    public $active;

    /**
     *
     * @var bool $show_children
     */
    public $show_children;

    /**
     *
     * @var bool $list_products
     */
    public $list_products;

    /**
     *
     * @var string $date_add
     */
    public $date_add = '00-00-0000 00:00';

    /**
     *
     * @var string $date_update
     */
    public $date_update = '00-00-0000 00:00';

    /**
     *
     * @var int $position
     */
    public $position = 0;

    /**
     *
     * @var string $image
     */
    public $image = '';

    /**
     *
     * @var string $icon
     */
    public $icon = '';

    /**
     *
     * @var LString $name
     */
    public $name = null;

    /**
     *
     * @var LString $description_short
     */
    public $description_short = null;

    /**
     *
     * @var LString $description
     */
    public $description = null;

    /**
     *
     * @var LString $rewrite
     */
    public $rewrite = null;

    /**
     *
     * @var LString $keywords
     */
    public $keywords = null;

    /**
     *
     * @var LString = $meta_desc
     */
    public $meta_desc = null;

    /**
     *
     * @var LString = $title
     */
    public $title = null;

    /**
     *
     * @var bool $dummy
     */
    public $dummy = false;

    /**
     *
     * @var int $map
     */
    public $map = 0;

    /**
     *
     * @var bool $disable_filters
     */
    public $disable_filters = false;
}
