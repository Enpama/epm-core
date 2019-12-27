<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class EmployeeGroup extends Model
{

    /**
     *
     * @var string
     */
    public $name = '';

    /**
     *
     * @var epm\type\Permission
     */
    public $permissions = null;
}
