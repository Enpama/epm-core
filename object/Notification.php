<?php
declare(strict_types = 1);
namespace epm\object;

use epm\data\Model;

class Notification extends Model
{

    /**
     *
     * @var integer
     */
    public $user_id = 0;

    /**
     *
     * @var \DateTime
     */
    public $date_add = null;

    /**
     *
     * @var bool
     */
    public $is_seen = false;

    /**
     *
     * @var string
     */
    public $title = '';

    /**
     *
     * @var string
     */
    public $details = '';

    /**
     *
     * @var string
     */
    public $action = '';
}
