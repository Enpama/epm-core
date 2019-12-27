<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class Module extends Model
{

    /**
     *
     * @var string
     */
    public $name = '';

    /**
     *
     * @var string
     */
    public $active = false;

    /**
     *
     * @var epm\type\LString
     */
    public $displayName = null;

    /**
     *
     * @var string
     */
    public $description = '';

    /**
     *
     * @var epm\type\LString
     */
    public $display_user = null;

    /**
     *
     * @var bool
     */
    public $installed = false;

    /**
     *
     * @var string
     */
    public $version = '';

    /**
     *
     * @var bool
     */
    public $hasSettings = false;

    /**
     *
     * @var bool
     */
    public $hasForm = true;

    /**
     *
     * @var string[]
     */
    public $tabs = array();

    /**
     *
     * @var string[]
     */
    public $scripts = array();

    /**
     *
     * @var string[]
     */
    public $styles = array();

    /**
     *
     * @var bool
     */
    public $init_called = false;

    /**
     *
     * @var bool
     */
    public $custom_payment = false;

    /**
     *
     * @var bool
     */
    public $adminlink = false;

    /**
     *
     * @var epm\type\LString
     */
    public $adminlink_label = null;

    /**
     *
     * @var bool
     */
    public $is_dev = false;
}
