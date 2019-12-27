<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class Employee extends Model
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
    public $last_name = '';

    /**
     *
     * @var string
     */
    public $email = '';

    /**
     *
     * @var string
     */
    public $password = '';

    /**
     *
     * @var string
     */
    public $secure_key = '';

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
     * @var \DateTime
     */
    public $last_login = null;

    /**
     *
     * @var int
     */
    public $last_ip = 0;

    /**
     *
     * @var int
     */
    public $group_id = 0;

    /**
     *
     * @var string
     */
    public $avatar = '';
}
