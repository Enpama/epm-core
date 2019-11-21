<?php
declare(strict_types = 1);
namespace epm\object;

use epm\core\data\Model;

class Brand extends Model
{

    public $name = '';

    public $logo = '';

    public $description = array();

    public $description_short = array();

    public $title = array();

    public $keywords = array();

    public $show = true;

    public function __construct(int $id = 0, int $lang_id = 0)
    {
        
    }
    
    public function load(array $data)
    {
        
    }

}
