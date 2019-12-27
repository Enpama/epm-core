<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class NavigationMenuItem extends Model
{

    /**
     *
     * @var integer
     */
    public $menu_id = 0;

    /**
     *
     * @var epm\type\LString
     */
    public $name = null;

    /**
     *
     * @var NavigationMenuItem[]
     */
    public $children = array();
}
