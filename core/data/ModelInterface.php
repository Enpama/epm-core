<?php

declare(strict_types = 1);
namespace epm\core\data;

interface ModelInterface{
    public function load(array $data);
}