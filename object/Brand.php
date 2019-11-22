<?php
declare(strict_types = 1);
namespace epm\object;

use epm\core\data\Model;
use epm\core\type\LString;

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
    public $description;

    /**
     *
     * @var LString $description_short
     */
    public $description_short;

    /**
     *
     * @var LString $title
     */
    public $title;

    /**
     *
     * @var LString $keywords
     */
    public $keywords;

    /**
     *
     * @var bool $show
     */
    public $show = true;

    public function __construct(int $id = 0, int $lang_id = 0)
    {
        parent::__construct($id, $lang_id);
        $this->description = new LString();
        $this->description_short = new LString();
        $this->keywords = new LString();
        $this->title = new LString();
    }

    public function load(array $data)
    {}
}
