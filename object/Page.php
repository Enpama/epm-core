<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class Page extends Model
{

    /**
     *
     * @var bool
     */
    public $active = false;

    /**
     *
     * @var bool
     */
    public $show = false;

    /**
     *
     * @var integer
     */
    public $position = 1;

    /**
     *
     * @var integer
     */
    public $parent = 0;

    /**
     *
     * @var \DateTime
     */
    public $date_add = null;

    /**
     *
     * @var \DateTime
     */
    public $date_edit = null;

    /**
     *
     * @var epm\type\LString
     */
    public $name = null;

    /**
     *
     * @var epm\type\LString
     */
    public $title = null;

    /**
     *
     * @var epm\type\LString
     */
    public $rewrite = null;

    /**
     *
     * @var epm\type\LString
     */
    public $keywords = null;

    /**
     *
     * @var epm\type\LString
     */
    public $content = null;

    /**
     *
     * @var epm\type\LString
     */
    public $meta_desc = null;

    /**
     *
     * @var string
     */
    public $icon = '';

    /**
     *
     * @var integer
     */
    public $view = 0;
}
