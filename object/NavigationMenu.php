<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class NavigationMenu extends Model
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
    public $location = '';

    /**
     *
     * @var NavigationMenuItem[]
     */
    public $items = array();
}
