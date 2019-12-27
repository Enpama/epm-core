<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class Language extends Model
{

    /**
     *
     * @var string
     */
    public $iso = '';

    /**
     *
     * @var string
     */
    public $name = '';
}
