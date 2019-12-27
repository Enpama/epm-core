<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;
use epm\type\LString;

class Brand extends Model
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
     * @var LString $description
     */
    public $description = null;

    /**
     *
     * @var LString $description_short
     */
    public $description_short = null;

    /**
     *
     * @var LString $title
     */
    public $title = null;

    /**
     *
     * @var LString $keywords
     */
    public $keywords = null;

    /**
     *
     * @var bool $show
     */
    public $show = true;
}
